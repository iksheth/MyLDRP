<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 14/04/16
 * Time: 3:05 PM
 */

require_once('core_class.php');
use university as university ;

$temp= new university\semester(2);
$temp->Division_worker('E');
$temp->Division_worker('B');

?>