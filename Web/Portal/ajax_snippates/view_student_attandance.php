<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 01/05/16
 * Time: 1:04 AM
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");

$erollnumber=$_POST["a"];
$query_string = "call view_student_attandance('".$erollnumber."')";
//$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = 'chirag.pandya'";

$result = $conn->query($query_string);
$a=[];
while($row = $result->fetch_assoc())
{
    $a[]=$row;
}

echo json_encode($a);





