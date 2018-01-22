<?php

/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 15/04/16
 * Time: 10:10 PM
 */

/*----------------Input Argument Structure-------------------------------
[1]---->File To Open (Only name  Without Extension)
[2]---->Semester (Only Number)
[3]---->Division
[4]---->DivisionID
[5]---->Subject Code
[6]---->DepartmentID
[7]---->BatchID
 -----------------------------*/

/*-------------------Output Json Structure------------------------------
(Created From associative Array)
[1]--->Semester
[2]--->Division
[3]--->Subject_code
[4]--->Total_number_of_lecture
[5-to-n] number_of_lectures_by_students
 ---------------------------*/
//error_reporting(E_ALL & ~E_WARNING);

date_default_timezone_set('Asia/Calcutta');


/*---- Global End Date Of Week ----*/


$G_End_Date = date("Y-m-d ", strtotime("19-3-2016"));
//$End_Date=date("Y-m-d ");
$G_End_Date_checker = date("w", strtotime($G_End_Date));

/*--------------------------------------------*/

class Sheet_proc
{
    var $semester;
    var $div;
    var $DivID;
    var $Subject_Code;
    var $BatchID;
    var $DepartmentID;
    var $week_date_list = array();
    var $date_index = array();
    var $return_array=array();
    var $query_string = "INSERT INTO `att_testing_struct` (`Lacture_Date`,`Subject_Code`, `Sr no`, `Erol`, `DepartmentID`, `Semester`, `DivisionID`, `BatchID`, `Present`,`SDLN`) VALUES";

    public function __construct($semester,$div,$DivID,$Subject_Code,$BatchID,$DepartmentID)
    {
        $this->week_date_list = $this->week_date_list_generator($GLOBALS['G_End_Date']);
        $this->semester=$semester;
        $this->div=$div;
        $this->DivID=$DivID;
        $this->Subject_Code=$Subject_Code;
        $this->BatchID=$BatchID;
        $this->DepartmentID=$DepartmentID;
        $this->return_array=array("Semester"=>$semester,"Division"=>$div,"Subject_Code"=>$Subject_Code,"DepartmentID"=>$DepartmentID);
    }


    function week_date_list_generator($input)
    {
        /* set time zone */
        date_default_timezone_set('Asia/Calcutta');

        /* append day and month to current year */
        $date_input = $input;

        /* create new object of  Date time and pass $input as variable */
        $dateTime = (new DateTime(rtrim($date_input)));

        /* setting offset of 7 days to traverse back 6 days */
        $offset = -6;

        $dateInterval = new DateInterval('P' . abs($offset) . 'D');
        if ($offset < 0) {
            $dateInterval->invert = 1;
        }

        /* append $dateInterval which go back 7 days to main datetime object */
        $dateTime->add($dateInterval);

        /* assign datetime object to $begin which contain 7 days back value of input data  */
        $begin = $dateTime;

        /* assign $input data to end means value of end pointer */
        $end = new DateTime(rtrim($date_input));
        $end = $end->modify('+1 day');

        /* day range generator offset ITS DIFFERENT THEN BEFORE ONE */
        $interval = new DateInterval('P1D');


        $daterange = new DatePeriod($begin, $interval, $end);


        /* print or store in array */
        foreach ($daterange as $i => $date) {
            $rt_array[$i] = $date->format("d/m/Y");
        }

        return $rt_array;

    }

    function file_processor($file_link)
    {
        $file = fopen($file_link, "r");
        /* Skipping 3 rows  */
        $x = fgetcsv($file);
        $x = fgetcsv($file);
        $x = fgetcsv($file);
        /* There is data in 4th row for dates */
        $date_data = fgetcsv($file);
        $x = fgetcsv($file);
        $this->date_index_create($date_data);
        if (count($this->date_index) != 0)
        {
            $this->return_array["Total_Lecture"]= count($this->date_index);
            while (true) {
                $Present_flag = 0;

                $content = fgetcsv($file);
                if ($content[0] == '' && $content[1] == '') {
                    break;
                }
                /*--- Each CSV call array init ---- */
                $attended_lectures = 0;
                $done_date_list = array();
                $SDLN = 1;


                /*LOOP For Each date + each student */
                foreach ($this->date_index as $index) {


                    $lecDate = str_replace('/', '-', $date_data[$index]);
                    $lecDate = date("Y-m-d", strtotime($lecDate));

                    if (in_array($lecDate, $done_date_list)) {
                        $SDLN = $SDLN + 1;
                    }

                    if ($content[$index] == 'p' || $content[$index] == 'P') {
                        $attended_lectures = $attended_lectures + 1;
                        $Present_flag = 1;
                    }

                    /*-- Store Date Which is Done --*/
                    $done_date_list[] = $lecDate;

                    /*-- Appand Sql string For New Record ----*/
                    $this->query_string = $this->query_string . "\n ('" . $lecDate . "','" . $this->Subject_Code . "', NULL,'" . $content[1] . "'," . $this->DepartmentID . "," . $this->semester . "," . $this->DivID . "," . $this->BatchID . "," . $Present_flag . "," . $SDLN . "),";

                }
                $this->return_array[$content[1]]=$attended_lectures;
            }



            $this->query_string = rtrim($this->query_string, ",");
            return $this->query_string;

        }
        fclose($file);



    }

    function date_index_create($date_data)
    {
        foreach ($this->week_date_list as $x) {
            $result = array_keys($date_data, $x);

            if (Count($result) != 0) {
                foreach ($result as $y)
                    $this->date_index[] = $y;
            }
        }
    }


}


/*------- Starting Of Main -----*/


/*<-- To Check is to day saturday ----->*/
if ($G_End_Date_checker == '6') {
//    $obj = new Sheet_proc(2,'E',1,$argv[5],$argv[6],$argv[7]);
   $obj= new Sheet_proc(1,1,1,1,"CETTT",1,1);
    $queryString=$obj->file_processor('Computer-2-E-CE204.csv');
    echo json_encode($obj->return_array)."\n";


    require("../../DataBase_Connections/db.php");
    if ($conn->query($queryString) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();

    /*
    $x = "15/4/2016";
    $a = str_replace('/', '-', $x);
    $a = date("d/m/Y", strtotime($a));
    $resutlt = array_search($a, $obj->week_date_list);
    echo $resutlt;*/

}


