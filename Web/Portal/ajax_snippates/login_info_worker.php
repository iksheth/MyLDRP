<?php
// Start the session
session_start();
?>
<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 01/05/16
 * Time: 10:29 AM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/DataBase_Connections/db.php");
$username = $_POST['username'];
$check_flag=$_POST['flag'];
$_SESSION["favanimal"] = "cat";
$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = '" . $username . "'";
//$query_string = "SELECT * FROM faculty_data WHERE `User_Name` = 'chirag.pandya'";


$result = $conn->query($query_string);
$row = $result->fetch_assoc();

    $_SESSION['first_name']=$row['First_Name'];
    $_SESSION['last_Name']=$row['Last_Name'];
    $_SESSION['designation']=$row['designation'];


if($check_flag==true){

    $_SESSION["username"] = $username;

    header('location:/Web/Portal/index.php');
}

