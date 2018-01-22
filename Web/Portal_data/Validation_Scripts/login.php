<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 30/04/16
 * Time: 10:32 AM
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
$username = $_POST['username'];
$password = $_POST['password'];

$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = '" . $username . "'";
//$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = 'chirag.pandya'";

$result = $conn->query($query_string);
$row = $result->fetch_assoc();
if ($password == $row['Password']) {
    return true;
//    header('location:/Web/Portal/index.html');
}
else {
    return false;
//    header('location:/Web/Portal/login.php');
}



/*$query_string = "SELECT * FROM faculty_data WHERE User_Name=  '" . $username . "' ";
$result = $dbcon_instance->query($sql);

if($username=="a"){
    header('location:/Web/Portal/index.html');
}*/