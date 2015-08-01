<?php
session_start();
include '../protected/config/db_config.php';
$db = new db_config();
$connect = $db->connect();
$data = '';

$uid = $_GET['report-id'];

//$delivery_report_sql = "INSERT INTO tbl_delivery_report (delivery_report_id, brand_name, delivery_status, date_created) VALUES ('" .$delivery_report_id. "', '" .$brand_name. "', '" .$status. "', '" .$date_created. "')";
$delivery_report_sql = "UPDATE tbl_delivery_report SET delivery_status = 'Pending' WHERE delivery_report_id = '".$uid."'";

$delivery_item_sql = "UPDATE tbl_deliveries SET delivery_status = 'Pending' WHERE delivery_report_id = '".$uid."'";

$delivery_report_query = mysqli_query($connect, $delivery_report_sql) or die(mysqli_error($connect));

$delivery_item_query = mysqli_query($connect, $delivery_item_sql) or die(mysqli_error($connect));

//print_r ($delivery_report_query);

//echo $uid;
	
?>