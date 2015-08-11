<?php
require_once('tcpdf_include.php');
require_once('../tcpdf.php');
include ('../../protected/config/db_config.php');
$db = new db_config();
$connect = $db->connect();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
$pdf->AddPage();
$tbl_header = '<table border="1">';
$tbl_footer = '</table>';
$tbl ='';
$sql = "SELECT * FROM tblDeliveries";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
	$delivery_id = $row['delivery_report_id'];
	$delivery_item_id  = $row['delivery_id'];
	$status = $row['delivery_status'];
	$brand_name = $row['brand_name'];
	$date_created = $row['date_created'];
	$details = $row['details'];
	$item_code = $row['item_code'];
	$unit_price = $row['unit_price'];
	$tbl .= "<tr>";
	$tbl .= "<td>" . $brand_name . "</td>";
	$tbl .= "<td>" . $details . "</td>";
	$tbl .= "</tr>";
}
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
$pdf->Output('user-delivery.pdf', 'I');