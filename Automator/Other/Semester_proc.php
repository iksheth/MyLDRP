<?php
/*
 * This is the process being called by the Software.
 * From here, we'll launch child process child.php
 */

 /* GLOBALS */
$semester= 2;
$division[0]='B';

$subject_codes=array('CE201','CE202','CE203','CE204','CE205','CE206');
 
/* END GLOBALS */

print_r($subject_codes);
print_r($division);

for($i=0;$i<count($division);$i++)
{
	$div_proc[$i]= exec('php index3.php '.$as.' '.$f2.' 2>&1 ',$output, $return_var);
}





















/* $f2 = "https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937"; */

/* $f2 ="index5.csv";
for ($i=0; $i<=50;$i++){
    $as="index".$i.".html";
    if(($i%2)==0){
$child = exec('php index3.php '.$as.' '.$f2.' 2>&1 ',$output, $return_var);
//echo $child;
var_dump($return_var);
//echo "return_var is: $return_var" . "\n";
var_dump($output);
    }
    else{
$as="index".$i.".html";
exec('php index3.php '.$as.' index4.csv 2>&1 ',$output, $return_var);
//echo $child;
//var_dump($return_var);
//echo "return_var is: $return_var" . "\n";
//var_dump($output);}
    
    
   
}
}
*/  


//// Desired folder structure
//$structure = './depth1/depth2/depth3/';
//
//// To create the nested structure, the $recursive parameter 
//// to mkdir() must be specified.
//
//if (!mkdir($structure, 0777, true)) {
//    die('Failed to create folders...');
//}









/*
 * Do some work, while already doing other
 * work in the child process.
 */

 

//$a=stream_get_contents($child1);
    //print_r(stream_get_contents($child1));
  //var_dump(stream_get_contents($child1));

?>