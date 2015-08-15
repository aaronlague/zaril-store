<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';
include '../protected/models/user-delivery-item.php';

$db = new db_config();
$formelem = new FormElem();
$deliveryItemModel = new DeliveryItemModel();

$connect = $db->connect();

$deliveryItemId = $_GET['deliveryItemId'];

?>

<?php
echo $deliveryItemModel->getDeliveryItemsDelete($_GET['deliveryItemId'], $connect);
?>