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



$brand_name = $_GET['brand_name'];
$fromDate = date('Y-m-d', strtotime($_GET['dateFrom'])) . ' 00:00:00';
$toDate = date('Y-m-d', strtotime($_GET['dateTo'])) . ' 23:59:59';

//echo $fromDate;
//echo $toDate;

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

//$sql = "SELECT * FROM tbl_sales_trans ORDER BY transaction_date DESC";
//$sqlGetSalesReport = "SELECT * FROM tbl_sales_trans WHERE brand_name = '". $brand_name ."' BETWEEN CAST('".$fromDate."' AS DATE) AND CAST('".$toDate."' AS DATE) ORDER BY transaction_date DESC";

if (($_GET['dateFrom'] == NULL) || ($_GET['dateTo'] == NULL)) {


		$sqlGetSalesReport = "SELECT * FROM tbl_sales_trans WHERE brand_name = '". $brand_name ."' ORDER BY transaction_date DESC";


} else {

		$sqlGetSalesReport = "SELECT * FROM tbl_sales_trans WHERE brand_name = '". $brand_name ."' AND transaction_date >= '".$fromDate."' AND transaction_date <= '".$toDate."'";

}


while ($row = mysqli_fetch_array($user_report_results)) {

	$sales_transaction_id = $row['sales_transaction_id'];
	$brand_name = $row['brand_name'];
	$item_code = $row['item_code'];			
	$price = $row['price'];
	$sales_tax_amount = $row['price'];
	$total_sales_price = $row['price'];
	$transaction_date = $row['transaction_date'];

	$new_date = date("d/m/Y h:i:s", strtotime($transaction_date) );


}



$tbl_header .='<table border="0">';

$tbl_header .='<tr>';

$tbl_header .='<td colspan="7"><strong>Brand Name:</strong> '.$brand_name.'</td>';

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

$tbl_header_titles .='<td>Item Code</td>';

$tbl_header_titles .='<td>Sales Tax</td>';

$tbl_header_titles .='<td>Total</td>';

$tbl_header_titles .='</tr>';

$tbl_footer = '</table>';

$tbl ='';


$user_report_results = mysqli_query($connect, $sqlGetSalesReport);
while ($row = mysqli_fetch_array($user_report_results)) {


	$sales_transaction_id = $row['sales_transaction_id'];
	$brand_name = $row['brand_name'];
	$item_code = $row['item_code'];			
	$price = $row['price'];
	$sales_tax_amount = $row['price'];
	$total_sales_price = $row['price'];
	$transaction_date = $row['transaction_date'];

	$new_date = date("d/m/Y h:i:s", strtotime($transaction_date) );




	$tbl .= '<tr class="details">';

	$tbl .= '<td>' . $sales_transaction_id . '</td>';

	$tbl .= '<td>' . $new_date . '</td>';

	$tbl .= '<td>' . $item_code . '</td>';

	$tbl .= '<td>' . $price . '</td>';

	$tbl .= '<td>' . $sales_tax_amount . '</td>';

	$tbl .= '<td>' . $total_sales_price . '</td>';

	$tbl .= '</tr>';

}



$pdf->writeHTML($tbl_header . $tbl_header_titles . $tbl . $tbl_footer, true, false, false, false, '');

$pdf->Output('user-sales-'.$reportId.'.pdf', 'I');