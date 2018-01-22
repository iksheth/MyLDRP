<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 13/04/16
 * Time: 8:48 AM
*/
include 'xyz.php';
$we = new xyz();
$we->a();
$a1=exec('php -v 2>&1',$opt);
echo $opt[0];
$a = 10;
echo "hello";
$a="apple";
echo $a;
echo phpinfo();
?>