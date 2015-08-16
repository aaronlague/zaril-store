<?php

require_once('tcpdf_include.php');

require_once('../tcpdf.php');

include ('../../protected/config/db_config.php');

$db = new db_config();

$connect = $db->connect();


// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  
// add a page
$pdf = new TCPDF();

//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);


$pdf->SetCreator(PDF_CREATOR);

//$pdf->SetAuthor('Nicola Asuni');


$pdf->SetSubject('');

$pdf->SetKeywords('');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'ZÁRIL lifestyle store', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

$pdf->setFooterData(array(0,1,0), array(0,1,1));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$resolution= array(80, 100);
$pdf->AddPage('P', $resolution);
$pdf->SetTitle('Tenant Sales Report');



$html = $_GET['html'];



#$html .='<div>'. $html .'</div>';


$pdf->writeHTML($html, false, false, true, false, '');
$pdf->Output('..');

