<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';
include '../protected/models/delivery-admin.php';

$db = new db_config();
$formelem = new FormElem();
$deliveryModel = new DeliveryModel();

$connect = $db->connect();

$brand_name = $_GET['brand_name'];
$status = $_GET['status'];

?>

<?php echo '<table class="table table-bordered table-striped" id="example1">';
echo '<thead>';
echo '<tr>';
echo '<th>Deliver ID</th>';
echo '<th>Brand</th>';
//echo '<th>Brand</th>';
echo '<th>Status</th>';
echo '<th>QTY Reported</th>';
//echo '<th>Item Code</th>';
echo '<th>QTY Received</th>';
//echo '<th>Quantity</th>';
echo '<th>Time Stamp</th>';
//echo '<th>Details of Product</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo $deliveryModel->getDeliveriesAdmin($_GET['brand_name'], $status, 'tbl_deliveries', $connect);
echo '</tbody>';
echo '</table>';
?>