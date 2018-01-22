<?php
$files = 0;

/* copy("https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937","EG.csv"); */

class semester
{
    var $sem;
    var $div;
    var $extension = ".html";

    function __construct($semester, $division)
    {
        $this->sem = $semester;
        $this->div = $division;
    }

    function calculate_per_subject_attendance($Sheet_link, $subject_code)
    {
        exec('php Sheet_proc.php ' . $Sheet_link . ' index4 ' . $this->sem . ' ' . $this->div . ' ' . $subject_code . ' 2>&1 ', $output, $return_var);
        /*--------------Section: Debug------------*/
        print_r($output);
        echo("\n\n\n\n");
        $x = json_decode($output[0], true);
        print_r($x);
        foreach ($x as $key => $value) {
            echo "Key: $key; Value: $value\n";
        }
        /*---------Section: Debug END------------*/
        return $x;
    }

    function file_generation($data_array)
    {
        $file_name = $this->sem . $this->div . $this->extension;
        $output_file = fopen($file_name, "w");
        fwrite($output_file, "<table border=1><th>EROLL</th><th>" . $data_array[0]['Subject_Code'] . "</th><th>" . $data_array[1]['Subject_Code'] . "</th>");
        foreach ($data_array[0] as $key => $value) {

            fwrite($output_file, "<tr><td>" . $key . "</td><td>" . $value . "</td><td>" . $data_array[1][$key] . "</td>");
            echo "Key: $key; Value: $value\n";
        }

    }


}

/*=====================================================Globals===================================================*/
$Semester = 1; //Semester

/*++++From Database++++*/

$Division_list = null; //Array that contains List Of Division Related To $Semester
$Subject_codes = null; //Array that contains Subject Codes For this Semester;

/* ++++From Database Ends++++*/


/*======================================================ENDS===================================================*/
/*------------------------------------------------------Main Section----------------------------------------------------------------------------*/


/*++++++++++++++++++++++Copying File Before Proceeding++++++++++++++++++++++*/

require('../DataBase_Connections/File_Copy.php');
$fileCopier = new copyFile;
$temp1 = $fileCopier->copy("https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937", "./", "CE1");


/*---------------------Copying File Before Proceeding ENDS-----------------*/
xdebug_break();

$obj1 = new semester('2','E');
$arr1[0] = $obj1->calculate_per_subject_attendance("../DataSheets/index4", "CE303");
$arr1[1] = $obj1->calculate_per_subject_attendance("../DataSheets/FOP", "CE505");
$a = $obj1->file_generation($arr1);


$obj2 = new semester('2', 'B');
$arr2[0] = $obj2->calculate_per_subject_attendance($temp1, "EG");
$arr2[1] = $obj2->calculate_per_subject_attendance("DataSheets/ENGG_PHY", "CE505");
$a = $obj2->file_generation($arr2);


/* sleep(50); */
/* Final File Generation Division Wise*/


?>
