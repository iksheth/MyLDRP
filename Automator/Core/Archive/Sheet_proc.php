<?php 
/*----------------Input Argument Structure------------------------------- 
[1]---->File To Open (Only name  Without Extension)
[2]---->Semester (Only Number)
[3]---->Division
[4]---->DivisionID
[5]---->Subject Code
[6]---->DepartmentID
[7]---->BatchID
 -----------------------------*/

/*-------------------Output Json Structure------------------------------
(Created From associative Array)
[1]--->Semester
[2]--->Division
[3]--->Subject_code
[4]--->Total_number_of_lecture
[5-to-n] number_of_lectures_by_students  
 ---------------------------*/

//error_reporting(E_ALL & ~E_WARNING);
date_default_timezone_set('Asia/Calcutta');

 
/* global VARIABLE SATARTS*/
$start_pointer=null;
$end_pointer=null;
$dyQuery[]=null;
$sem=$argv[2];
$div=$argv[3];
$DivID=$argv[4];
$Subject_Code=$argv[5];
$BatchID=$argv[6];
$DepartmentID=$argv[7];
$return_array=null;
/* ENDS */

/* Return Array*/
$return_array["Semester"]=$sem;
$return_array["Division"]=$div;
$return_array["Subject_Code"]=$Subject_Code;
$return_array["DepartmentID"]=$DepartmentID;


/* opens file */
//$file = fopen("index4.csv","r");
/* $sopen=$argv[1]; */
$file = fopen($argv[1].".csv","r");
//$as=$argv[2].".html";
//$file = fopen("https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937","r");

//$st=$as;
//$st="/Users/karansheth/Desktop/store/index3444.html";

// var_dump($file);
/* echo $file; */
//$file_op = fopen($st,"w");
$query_string="INSERT INTO `att_testing_struct` (`Lacture_Date`,`Subject_Code`, `Sr no`, `Erol`, `DepartmentID`, `Semester`, `DivisionID`, `BatchID`, `Present`,`SDLN`) VALUES";






/* Skipping 3 rows  */
$x=fgetcsv($file);
$x=fgetcsv($file);
$x=fgetcsv($file);
/* There is data in 4th row for dates */
$date_data=fgetcsv($file);
/* print_r($date_data); */

/* Crop data and dates */
for($i=0;$i<=count($date_data)-1;$i++)
{
if($date_data[$i]==null){
/* echo "END Pointer:- ".($i-1) ."<br/>"; */
 $end_pointer=$i-1; 
 /* echo "\n".$date_data[$end_pointer]."\n"; */
 
 
 
 for($i=0;$i<=5;$i++){
 $date_sharper=date("w",strtotime(str_replace('/','-',$date_data[$end_pointer-$i])));
 /* echo $date_data[$end_pointer-$i]; */
  if($date_sharper==6){break;}  
 }
  break;
 }
 
/* echo $date_data[$i]; */
/* var_dump($date_data[$i]); */
/* echo "<br/>"; */
}

$a = str_replace('/','-',$date_data[$end_pointer]);
$a = date("Y-m-d",strtotime($a));
/* print_r($a); */
$catch_a=start_pointer($a);

/* loop for finding  start pointer  */
$i=$end_pointer;
while($i>=0){
if($date_data[$i]==$catch_a[0])
{$start_pointer=$i+1; break;
}
$i=$i-1;
}


/* print_r($catch_a); */


/* echo "<br>Start ".$start_pointer."<br />"; */

/* skip row 5th  */
$skip_row5=fgetcsv($file);

/* taking Student data */
//fwrite($file_op,"<table border=1><th>EROLL</th><th>total class</th><th>Attended class</th><th>Percent</th>");


/* FOR multiple students */
$total_lec = $end_pointer - $start_pointer+1;
  
while(true)
	{
	$proc=fgetcsv($file);
	if($proc[0]=='' && $proc[1]==''){break;}
	/* print_r($proc); */
//	fwrite($file_op,"<tr><td>". $proc[1] ."</td>");
	
	/* Peint Enrolment Number */
	$ap=0;
	$SDLN=1;
	for($i=$start_pointer;$i<=$end_pointer;$i++)
	{
		$p_flag=0;
		$lecDate = str_replace('/','-',$date_data[$i]);
		$j=$i-1;
		
		while($i-$j<=5){
		if($date_data[$i]==$date_data[$j]){$SDLN++;break;}
		$j--;
	}
		$lecDate = date("Y-m-d",strtotime($lecDate));
		if($proc[$i]=="P"||$proc[$i]=="p")	
		{
			/* echo "Present"; */
			$ap=$ap+1;
			/* Sql Quuery Creation */
			/* $lecDate=$date_data[$i]; */
			$p_flag=1;
		}
	$query_string=$query_string."\n ('".$lecDate."','".$Subject_Code."', NULL,'".$proc[1]."',".$DepartmentID.",".$sem.",".$DivID.",".$BatchID.",".$p_flag.",".$SDLN."),";
//		INSERT INTO `db_testing`.`att_testing_struct` (`Lacture_Date`,`Subject_Code`, `Sr no`, `Erol`, `DepartmentID`, `Semester`, `DivisionID`, `BatchID`, `Present`,`SDLN`)
	/* echo "\n ('".$lecDate."','".$Subject_Code."', NULL,'".$proc[1]."', 1, 1, 1, 1, ".$p_flag.",".$SDLN."),"; */
	}
	
	
	
	
	
	
	
	
	/* Print Total Lec */
//	fwrite($file_op,"<td >". $total_lec ."</td>");
	$return_array["Total_Lecture"]= $total_lec;
	
	/* Print Present total  */
//	fwrite($file_op,"<td >". $ap ."</td>");
	$return_array[$proc[1]]=$ap;
	
	$percent=(($ap/$total_lec)*100);
	if($percent<=25)
	{
//	fwrite($file_op,"<td style='background:red;color:white;'>". $percent ."%</td></tr>");
	}
	else{
//		fwrite($file_op,"<td >". $percent ."%</td></tr>");
		}
	}
	
//fwrite($file_op,"</table>");

fclose($file);
//fclose($file_op);



//------------[Return Section]-------------------------//

echo json_encode($return_array)."\n";


/*-------------------------------------------------------Section: Database -------------------------------------------------------------*/

/* DataBase Connection */
$query_string=rtrim($query_string, ",");

require("../../DataBase_Connections/db.php");



if ($conn->query($query_string) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: <br>" . $conn->error;
}

$conn->close(); /* ENDS DB Connection */
/*-------------------------------------------------------- END ------------------------------------------------------------- */


$x=fopen("dump.dump","w");
fwrite($x,$query_string);
fclose($x);


/*----------------------------------- END Of File ---------------------------------------------- */












/* start_pointer FUNCTION */
function start_pointer($input){
/* set time zone */
date_default_timezone_set('Asia/Calcutta');

/* append day and month to current year */
$date_input = $input;

/* create new object of  Date time and pass $input as variable */
$dateTime = (new DateTime(rtrim($date_input)));

/* setting offset of 7 days to traverse back 7 days */
$offset = -7;

$dateInterval = new DateInterval('P' . abs($offset) . 'D');
 if ($offset < 0) {
       $dateInterval->invert = 1;
 }

 /* append $dateInterval which go back 7 days to main datetime object */
$dateTime->add($dateInterval);

/* assign datetime object to $begin which contain 7 days back value of input data  */
$begin = $dateTime;

/* assign $input data to end means value of end pointer */
$end = new DateTime(rtrim($date_input));
$end = $end->modify( '+1 day' ); 

/* day range generator offset ITS DIFFERENT THEN BEFORE ONE */
$interval = new DateInterval('P1D');


$daterange = new DatePeriod($begin, $interval ,$end);


/* print or store in array */
foreach($daterange as $i=>$date){
	$rt_array[$i]=$date->format("d/m/Y");
} 

return $rt_array;

}




?>




