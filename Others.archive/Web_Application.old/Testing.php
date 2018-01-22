<?php
/*require('html_table.php');
$pdf=new PDF();
$pdf->AddPage('L');
$pdf->SetFont('Arial','',12);

$html='<table border="1">
<tr>
<td width="200" height="30">cell 1</td><td width="200" height="30" bgcolor="#D0D0FF">cell 2</td>
</tr>
<tr>
<td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td>
</tr>
</table>';
$a=file_get_contents('Partial_View/Test.html');

$pdf->WriteHTML($a);
$pdf->Output();*/
/*
$pdf = new FPDF();
$pdf->AddPage();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B","16");
$pdf->Cell(10,10,"0",0,0,'center');
$pdf->Output();
print_r(get_class_methods($pdf));*/
include 'Partial_View/partial_header.html';
include 'Partial_View/Test.html';
include 'Partial_View/partial_footer.html';




?>