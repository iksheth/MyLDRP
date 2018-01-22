<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 30/04/16
 * Time: 10:32 AM
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
$username = $_POST['username'];
$password = $_POST['pswd'];
if($username != '' && $password!= '' ){
$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = '" . $username . "'";
//$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = 'chirag.pandya'";

$result = $conn->query($query_string);
$row = $result->fetch_assoc();
if ($password == $row['Password']) {
//    header('location:/Web/Portal/index.html');
$return_array['success']= true;
    session_start();
    $_SESSION['favcolor'] = 'green';
    echo json_encode($return_array);
}
else {
    $return_array['success']= false;
    echo json_encode($return_array);
//    header('location:/Web/Portal/login.php');
}

    }
else {
    $return_array['success']= false;
    echo json_encode($return_array);
//    header('location:/Web/Portal/login.php');
}

$conn->close();



/*$query_string = "SELECT * FROM faculty_data WHERE User_Name=  '" . $username . "' ";
$result = $dbcon_instance->query($sql);

if($username=="a"){
    header('location:/Web/Portal/index.html');
}*/