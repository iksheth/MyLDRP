<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname="ldrp_repository";



class createCon  {
    var $myconn;

    function connect() {
        $con = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'],$GLOBALS['password'], $GLOBALS['dbname']);
        if (!$con)
        {
            die('Could not connect to database!');
        }
        else
        {
            $this->myconn = $con;
//            echo 'Connection established!';
        }
        return $this->myconn;
    }

    function close() {
        mysqli_close($this->myconn);
//        echo 'Connection closed!';
    }

}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*$a = new createCon();
$b=$a->connect();
var_dump($b);
$a->close();
var_dump($b);*/




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
