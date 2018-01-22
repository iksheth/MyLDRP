<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname="db_testing";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



/* 
try {
    $conn = new PDO("mysql:host=$servername;dbname=db_testing", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
     // use exec() because no results are returned
	
	
	}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } */

	
?>
