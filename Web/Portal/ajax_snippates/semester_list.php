<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 02/05/16
 * Time: 1:03 AM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");

$erollnumber=$_POST["a"];
$query_string = "SELECT * FROM semester where IsRunning=1";
//$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = 'chirag.pandya'";

$result = $conn->query($query_string);
$a=[];
while($row = $result->fetch_assoc())
{
    $a[]=$row['Semester'];
}

$conn->close();
echo json_encode($a);