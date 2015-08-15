<?php

require_once('tcpdf_include.php');

require_once('../tcpdf.php');

include ('../../protected/config/db_config.php');

$db = new db_config();

$connect = $db->connect();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);

//$pdf->SetAuthor('Nicola Asuni');

$pdf->SetTitle('Tenant Sales Report');

$pdf->SetSubject('');

$pdf->SetKeywords('');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'ZÁRIL lifestyle store', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));

$pdf->setFooterData(array(0,64,0), array(0,64,128));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {

	require_once(dirname(__FILE__).'/lang/eng.php');

	$pdf->setLanguageArray($l);

}



$pdf->SetFont('', '', 8, '', true);



$pdf->AddPage();







$tbl_header .= '<style>
	tr.info td {
		height:60px; text-align:left;
	}
	tr.headings td{
		text-align:center; height:30px; background-color:#ccc; font-weight:bold;
	}
	tr.details td {
		text-align:center; height:15px;
	}
</style>';



$tbl_header .='<table border="0">';

$tbl_header .='<tr>';

$tbl_header .='<td colspan="7"><strong>Brand Name:</strong> </td>';

$tbl_header .='</tr>';

$tbl_header .='<tr>';

$tbl_header .='<td colspan="7"><strong>Date:</strong></td>';

$tbl_header .='</tr>';

$tbl_header .='<tr>';

$tbl_header .='<td colspan="7">&nbsp;</td>';

$tbl_header .='</tr>';

$tbl_header .='</table>';


$tbl_header .= '<table border="1">';

$tbl_header_titles .='<tr class="headings">';

$tbl_header_titles .='<td>Transaction #</td>';

$tbl_header_titles .='<td>DateTime of Purchase</td>';

$tbl_header_titles .='<td>Price</td>';

$tbl_header_titles .='<td>Sales Tax</td>';

$tbl_header_titles .='<td>Total</td>';

$tbl_header_titles .='</tr>';

$tbl_footer = '</table>';

$tbl ='';


$pdf->writeHTML($tbl_header . $tbl_header_titles . $tbl . $tbl_footer, true, false, false, false, '');

$pdf->Output('user-sales-'.$reportId.'.pdf', 'I');