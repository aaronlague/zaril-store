<?php
require_once('tcpdf_include.php');
require_once('../tcpdf.php');
include ('../../protected/config/db_config.php');
$db = new db_config();
$connect = $db->connect();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');


$pdf->SetTitle('Admin Delivery Report');
$pdf->SetSubject('');
$pdf->SetKeywords('');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'ZÁRIL lifestyle store', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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

$reportId = $_GET['report_id'];

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

$sqlGetDeliveryReport = "SELECT * FROM tbl_delivery_report WHERE delivery_report_id = '".$reportId."'";

$delivery_report_results = mysqli_query($connect, $sqlGetDeliveryReport);
while ($row = mysqli_fetch_array($delivery_report_results)) {

	$brand_name = $row['brand_name'];
	$delivery_report_id = $row['delivery_report_id'];
	$date_accepted = $row['date_accepted'];

}

$tbl_header .='<table border="0">';
$tbl_header .='<tr>';
$tbl_header .='<td colspan="7"><strong>Brand Name:</strong> '.$brand_name.'</td>';
$tbl_header .='</tr>';
$tbl_header .='<tr>';
$tbl_header .='<td colspan="7"><strong>Delivery Report ID:</strong> '.$delivery_report_id.'</td>';
$tbl_header .='</tr>';
$tbl_header .='<tr>';
$tbl_header .='<td colspan="7"><strong>Date Accepted:</strong> '.$date_accepted.'</td>';
$tbl_header .='</tr>';
$tbl_header .='<tr>';
$tbl_header .='<td colspan="7">&nbsp;</td>';
$tbl_header .='</tr>';
$tbl_header .='</table>';

$tbl_header .= '<table border="1">';
$tbl_header_titles .='<tr class="headings">';
$tbl_header_titles .='<td>Quantity</td>';
$tbl_header_titles .='<td>Status</td>';
$tbl_header_titles .='<td>Delivery Item ID</td>';
$tbl_header_titles .='<td>Item Code</td>';
$tbl_header_titles .='<td>Brand Name</td>';
$tbl_header_titles .='<td>Description</td>';
$tbl_header_titles .='<td>Unit Price</td>';
$tbl_header_titles .='</tr>';
$tbl_footer = '</table>';
$tbl ='';


$sqlGetDeliveryItems = "SELECT * FROM tbl_deliveries WHERE delivery_report_id = '".$reportId."' AND delivery_status = 'Pending' OR delivery_status = 'Accepted'";

$delivery_item_results = mysqli_query($connect, $sqlGetDeliveryItems);
while ($row = mysqli_fetch_array($delivery_item_results)) {

	$quantity  = $row['quantity'];
	$delivery_item_id  = $row['delivery_id'];
	$delivery_id = $row['delivery_report_id'];
	$status = $row['delivery_status'];
	$brand_name = $row['brand_name'];
	$date_created = $row['date_created'];
	$details = $row['details'];
	$item_code = $row['item_code'];
	$unit_price = $row['unit_price'];

	$tbl .= '<tr class="details">';
	$tbl .= '<td>' . $quantity . '</td>';
	$tbl .= '<td>' . $status . '</td>';
	$tbl .= '<td>' . $delivery_item_id . '</td>';
	$tbl .= '<td>' . $item_code . '</td>';
	$tbl .= '<td>' . $brand_name . '</td>';
	$tbl .= '<td>' . $details . '</td>';
	$tbl .= '<td>' . $unit_price . '</td>';
	$tbl .= '</tr>';
}

$pdf->writeHTML($tbl_header . $tbl_header_titles . $tbl . $tbl_footer, true, false, false, false, '');
$pdf->Output('user-delivery-'.$reportId.'.pdf', 'I');