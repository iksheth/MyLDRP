<?php
/**
 * Created by PhpStorm.
 * User: karansheth
 * Date: 14/04/16
 * Time: 8:11 PM
 */

$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
$list_of_divisions = ['E'=>101,'B'=>102]; /*From Database*/
$list_of_divisions_keys = array_keys($this->list_of_divisions);
$b=array_keys($a);

print_r($a);
echo "<br>";
print_r($b);
echo "<br>";

unset($a['Volvo']);

print_r($a);echo "<br>";

print_r($b);echo "<br>";

?>

</body>
</html>