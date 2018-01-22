<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 14/04/16
 * Time: 9:23 AM
 */
require_once('core_class.php');
require_once($_SERVER['DOCUMENT_ROOT'] ."/DataBase_Connections/File_Copy.php");
require_once($_SERVER['DOCUMENT_ROOT'] ."/DataBase_Connections/db.php");

use university as university ;


/*--------------------- Active Semester List From Database --------------------------------------------*/

$sql = "SELECT semester FROM semester where IsRunning = 1";
$result = $conn->query($sql);
$current_on_going_semester_list= array();
while($row = $result->fetch_assoc())
{
    $current_on_going_semester_list[]= $row["semester"];
}


/*----------------- DataBase Query For List Of Departments ---------------------------------*/

$sql = "SELECT DepartmentID,Department_Name FROM department_data";
$result = $conn->query($sql);
$Department_list = array();
while($row = $result->fetch_assoc())
{
    $Department_list[$row["DepartmentID"]]= $row["Department_Name"];
}
$Department_list_ID=array_keys($Department_list);

/*----------------- DataBase Query For List Of Divisions ---------------------------------*/
$i=0;

/*LOOP of Departments------------------------------*/
$sql = "SELECT DivisionID,Division_Name FROM division_data WHERE DepartmentID =".$Department_list_ID[$i];
$result = $conn->query($sql);
$Division_list = array();
while($row = $result->fetch_assoc())
{
    $Division_list[$row["DivisionID"]]= $row["Division_Name"];
}

$department=new university\department($Department_list[$Department_list_ID[$i]],$Department_list_ID[$i],$Division_list);

    /*--------------------- Loop For Number of Semesters -----------------*/
    for($i=0;$i<count($current_on_going_semester_list);$i++)
    {
        $department->semester_worker($current_on_going_semester_list[$i]);
    }




    /*--------------------- Semester Loop ENDS -----------------*/


/*Loop ENDS------------------------*/








/*++++From Database++++*/
$Subject_codes = null; //Array that contains Subject Codes For this Semester;

/* ++++From Database Ends++++*/


/*------------------------------------------------------Main Section----------------------------------------------------------------------------*/

/*++++++++++++++++++++++Copying File Before Proceeding++++++++++++++++++++++*/


/*$fileCopier = new copyFile;
$temp1 = $fileCopier->copy("https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937", "../temp_sheets/", "CE1");
*/

/*---------------------Copying File Before Proceeding ENDS-----------------*/









/*$semester= new university\semester(2);
$semester->Division_worker("../temp_sheets/CE1", "CE305");*/
//$semester->Division_worker('B',"../temp_sheets/CE1", "CE304");


/*
$arr1 = null;
$obj1 = new university\division('2', 'E');
$arr1[0] = $obj1->calculate_per_subject_attendance("../temp_sheets/CE1", "CE303");
$arr1[1] = $obj1->calculate_per_subject_attendance("../temp_sheets/CE1", "CE505");
$a = $obj1->file_generation($arr1);


$obj2 = new university\division('2', 'B');
$arr2[0] = $obj2->calculate_per_subject_attendance($temp1, "EG");
$arr2[1] = $obj2->calculate_per_subject_attendance("../temp_sheets/CE1", "CE505");
$a = $obj2->file_generation($arr2);
*/

/* sleep(50); */
/* Final File Generation Division Wise*/


