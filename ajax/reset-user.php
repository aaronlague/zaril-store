<?php
include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';
include '../protected/models/users.php';

$db = new db_config();
$formelem = new FormElem();
$userModel = new UsersModel();

$connect = $db->connect();
$userid = $_GET['userid'];

?>

<?php
echo $userid;
echo $userModel->passwordReset($userid, $connect);
?>