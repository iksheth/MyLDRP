<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 01/05/16
 * Time: 6:41 PM
 */
session_start();


$sesstion_flag= session_destroy();
if($sesstion_flag==True){
    header('location:../login.php');
}
