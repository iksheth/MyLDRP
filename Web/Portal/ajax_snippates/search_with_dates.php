<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 02/05/16
 * Time: 9:06 AM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
$semester=$_POST["semester"];
$division=$_POST['division'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];

//----------------- Date Convert: DD/MM/YYYY to YYYY-MM-DD [Required due to Database] -------------------//

$start_date=MMDDtoDDMM($start_date);
$end_date=MMDDtoDDMM($end_date);



//------------------ Date Convert: END -------------------//

$query_string ="SELECT DivisionID FROM division_data WHERE Division_Name='".$division."'and DepartmentID=1";
$result = $conn->query($query_string);
$divisionID=$result->fetch_assoc();
$divisionID=$divisionID['DivisionID'];



$query_string = "SELECT Subject_Code,Subject_Name FROM subject_data WHERE semester=".$semester." and DepartmentID=1";
$result = $conn->query($query_string);
$number_of_subjects=$result->num_rows;




$top="select DISTINCT att_testing_struct.Erol";
$joins="";

while($row = $result->fetch_assoc())
{
    $top=$top.",".$row["Subject_Code"].".att as '".$row["Subject_Name"]."'";
    $c[]=$row["Subject_Name"];
    $joins=$joins." INNER JOIN (select erol,concat(CAST(SUM(Present) AS char(20)),' / ',COUNT(Present)) as Att from att_testing_struct where Subject_Code='".$row["Subject_Code"]."' AND Lacture_Date BETWEEN '".$start_date."' and '".$end_date."' GROUP by Erol ORDER BY `erol` ASC) as ".$row["Subject_Code"]." on ".$row["Subject_Code"].".erol=att_testing_struct.erol";



}


$mid=" from att_testing_struct";
//------------------- Joining Of Strings ----------------------
$query_string=$top." ".$mid." ".$joins." WHERE DivisionID=".$divisionID;


$result = $conn->query($query_string);

while($row = $result->fetch_assoc())
{
    $a[]=$row;
}

$conn->close();


$return['number_of_subjects']=$number_of_subjects;
$return['subject_name']=$c;
$return['data']=$a;
echo json_encode($return);

function MMDDtoDDMM($ddate)
{
    $ddate = str_replace('/', '-', $ddate);
    $ddate = date("Y-m-d", strtotime($ddate));
    return $ddate;

}
