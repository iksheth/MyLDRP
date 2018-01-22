<?php 
class copyFile{
/* Varible(s) */
 var $Source = null;
 var $destination_location="./";
 var $outputFileName = null;
 var $extension = ".csv";
	/*--------Countructure------*/
	/* <Returns Name Of File And Location> */
	function copy($Source,$destination_location,$outputFileName) 
	{
		$FileName=$destination_location.$outputFileName;
		$Final_output_String=$FileName.$this->extension;
		$result=copy($Source,$Final_output_String);
		if($result)
		{
		return $FileName;
		}
	}

}

/* $obj1= new copyFile;
$obj1->copy("https://docs.google.com/spreadsheets/d/1NO_apkuzjAe3sL0d2TLl6iSKuOGHhHOjPxmvfdMYN2g/pub?output=csv&gid=1375614937","./","CE1");
 */

?>