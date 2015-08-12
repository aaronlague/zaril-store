<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';
include '../protected/models/transaction-items-display.php';

$db = new db_config();
$formelem = new FormElem();
$transactionItemsModel = new TransactionItemsModel();

$connect = $db->connect();

$item_code = $_GET['item_code'];

?>

<?php echo $transactionItemsModel->getTransactionItems($item_code, $connect) ?>