<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 14/04/16
 * Time: 9:16 AM
 */

namespace university {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/File_Copy.php");
    /*------------ Globals ---------------------*/
    $G_DepartmentID = null;
    $G_DepartmentName = null;
    $G_DB_Log = $_SERVER['DOCUMENT_ROOT'] ."/Logs/Database_entry_logs/DB_Entry_Log ".date("d-M-y (h_i_s)").".log";
    $G_SMS_Log = $_SERVER['DOCUMENT_ROOT'] ."/SMS/Sms ".date("d-M-y (h_i_s)").".html";
    /*----------- ENDS ------------------------*/

    class department
    {
        /*-----Varibles-----*/
        private $departmentName = null;
        private $departmentID = null;
        private $divisions = array();
        private $divID = array();

        public function __construct($deptName, $deptID, $div_list)
        {
            $this->departmentName = $deptName;
            $this->departmentID = $deptID;
            $this->divisions = $div_list;
            $this->divID = array_keys($div_list);
            $GLOBALS['G_DepartmentID'] = $deptID;
            $GLOBALS['G_DepartmentName'] = $deptName;

        }

        function semester_worker($semesterNumber)
        {
            $semester = new semester($semesterNumber);
            /*Query Semesters from db*/

//            for($i=0;$i<count($this->divisions);$i++)
            for ($i = 0; $i < 1; $i++) {
                $semester->Division_worker('E', 1, "../temp_sheets/CE1", "CE303");

            }


        }
    }

    class semester
    {
        private $semesterNumber = null;

        public function __construct($semNumber)
        {
            $this->semesterNumber = $semNumber;
        }


        function Division_worker($div, $divID, $sheet_links, $subject_code)
        {

            $arr = null;
            $div = new division($div, $divID, $this->semesterNumber);


            /*Debug*/
            $deb_a = count($div->subject_code);

            /*LOOP Number of Sheet times*/
            for ($i = 0; $i < count($div->subject_code); $i++) {
                $fileCopier = new \copyFile();
                $temp1 = $fileCopier->copy($div->subject_links[$div->subject_code[$i]], "../temp_sheets/", $GLOBALS['G_DepartmentName'] . "-" . $this->semesterNumber . "-" . $div->div . "-" . $div->subject_code[$i]);
                $arr[$i] = $div->calculate_per_subject_attendance($temp1, $div->subject_code[$i]);
            }

            $div->file_generation($arr);

        }

    }

    class division
    {


        public $div;
        var $subject_code;
        var $subject_links;
        /*--- Subject Code and Links Varible ---*/
        var $extension = ".html";
        var $data_array = null;

        /*--- Others --*/
        private $sem;
        private $divID;

        function __construct($division, $divisionID, $semester)
        {
            $this->sem = $semester;
            $this->div = $division;
            $this->divID = $divisionID;
            $this->list_link_subject_codes();
        }

        function list_link_subject_codes()
        {
            $dbcon = new \createCon();
            $dbcon_instance = $dbcon->connect();
            $sql = "SELECT index_of_google_sheet.Subject_Code,CONCAT(Link_Part_1,\"&gid=\",GID) as Link_Part_1
                    FROM index_of_google_sheet inner join subject_data on subject_data.Subject_Code=index_of_google_sheet.Subject_Code
                    WHERE subject_data.semester =" . $this->sem . " and subject_data.DepartmentID = " . $GLOBALS['G_DepartmentID'] . " and DivisionID =" . $this->divID;
            $result = $dbcon_instance->query($sql);

            while ($row = $result->fetch_assoc()) {
                $this->subject_links[$row["Subject_Code"]] = $row["Link_Part_1"];
            }

            $this->subject_code = array_keys($this->subject_links);
            $dbcon->close();
        }


        function calculate_per_subject_attendance($Sheet_link, $subject_code)
        {
            exec('php Sheet_proc_class.php ' . $Sheet_link . ' ' . $this->sem . ' ' . $this->div . ' ' . $this->divID . ' ' . $subject_code . ' 1 ' . $GLOBALS['G_DepartmentID'] . ' 2>&1 ', $output, $return_var);
            $x = json_decode($output[0], true);
            if (file_exists($GLOBALS['G_DB_Log']))
            {
                $y = file_put_contents($GLOBALS['G_DB_Log'], "\n".$output[1]." For ".$subject_code." Semester: ".$this->sem." Division: ".$this->div." of ".$GLOBALS['G_DepartmentName']." Department", FILE_APPEND);
            }
            else
            {
                $file=fopen($GLOBALS['G_DB_Log'],"w");
                fwrite($file,$output[1]." For ".$subject_code." Semester: ".$this->sem." Division: ".$this->div." of ".$GLOBALS['G_DepartmentName']." Department");
            }




            /*--------------Section: Debug------------*/
            /*foreach ($x as $key => $value) {
                echo "Key: $key; Value: $value\n";
            }*/
            /*---------Section: Debug END------------*/
            return $x;
        }

        function file_generation($data_array)
        {
            /*----- Fatch Subject Name -----*/
            $dbcon = new \createCon();
            $dbcon_instance = $dbcon->connect();
            $sql = "SELECT Subject_Code,Subject_Name FROM `subject_data` WHERE semester = " . $this->sem . " and DepartmentID =" . $GLOBALS["G_DepartmentID"];
            $result = $dbcon_instance->query($sql);
            $tla = 0;
            $ap = 0;
            $tl = 0;

            $subject_Name = array();
            while ($row = $result->fetch_assoc()) {
                $subject_Name[$row["Subject_Code"]] = $row["Subject_Name"];
            }


            $file_name = $this->sem . $this->div . $this->extension;
            $file_location = $_SERVER['DOCUMENT_ROOT'] . '/data_storage/computer/' . $this->sem . '/' . $this->div . '/' . $file_name;
            $output_file = fopen($file_location, "w");
            $output_file_sms=fopen($GLOBALS['G_SMS_Log'],"w");
            $header_string = "<table border=1 id='tbl_main' ><thead><tr><th>EROLL</th><th>";
            for ($i = 0; $i < count($data_array); $i++) {
                unset($data_array[$i]['DepartmentID']);
                $tl = $tl + $data_array[$i]['Total_Lecture'];
                if ($i >= (count($data_array) - 1)) {
                    $header_string = $header_string . $data_array[$i]['Subject_Code'] . "</th>";
                } else {
                    $header_string = $header_string . $data_array[$i]['Subject_Code'] . "</th><th>";
                }
            }
            $header_string=$header_string."";


            fwrite($output_file, $header_string . "<th>Total Lectures Attended</th><th>Attendance Percentage</th></tr></thead><tbody>");
            fwrite($output_file_sms, $header_string . "<th>Total Lectures Attended</th><th>Attendance Percentage</th></tr></thead><tbody>");
//            fwrite($output_file, "<table border=1><th>EROLL</th><th>" . $data_array[0]['Subject_Code'] . "</th><th>" . $data_array[1]['Subject_Code'] . "</th>");
            foreach ($data_array[0] as $key => $value) {
                $cont_string = "<tr><th>" . $key . "</th><td>";
                for ($i = 0; $i < count($data_array); $i++) {
                    $tla = $tla + $data_array[$i][$key];


                    if ($key == "Subject_Code") {
                        $data_array[$i][$key] = $subject_Name[$data_array[$i][$key]];
                    }
                    if ($i >= (count($data_array) - 1)) {
                        $cont_string = $cont_string . $data_array[$i][$key] . "</td>";
                    } else {
                        $cont_string = $cont_string . $data_array[$i][$key] . "</td><td>";
                    }
                }

                $row_skipper_list = ['Semester', 'Division', 'Subject_Code'];
                if (!in_array($key, $row_skipper_list)) {
                    if (is_numeric($tla)) {
                        $ap = ($tla / $tl) * 100;
                        $cont_string = $cont_string . "<td>" . $tla . "</td><td>" . $ap . "</td></tr>";
                        if($ap <= 40 )
                        {
                            fwrite($output_file_sms,$cont_string);
                        }
                    }
                } else {
                    $cont_string = $cont_string . "<td>&nbsp&nbsp</td><td>&nbsp&nbsp</td></tr>";
                }

//                $cont_string=$cont_string."</td></tr></table>";

                fwrite($output_file, $cont_string);


                //echo "Key: $key; Value: $value\n";
                $tla = 0;
            }

        }

    }


}