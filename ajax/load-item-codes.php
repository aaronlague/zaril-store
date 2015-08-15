<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';

$db = new db_config();

$connect = $db->connect();

$item_code = $_GET['item_code'];

$sql = "SELECT item_code FROM tbl_deliveries WHERE delivery_status = 'Accepted' AND item_code LIKE '".strtoupper($item_code)."%'";
$result = mysqli_query($connect, $sql);

$data = array();

while ($row = mysqli_fetch_array($result)) {
	$item_code = $row['item_code'];

	array_push($data, $item_code);
}

echo json_encode($data);

?>