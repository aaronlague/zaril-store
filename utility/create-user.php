<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';

$db = new db_config();
$formelem = new FormElem();

$connect = $db->connect();

if(isset($_POST['btn-create'])){

	
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];;
	$data['brand_name'] = $_POST['brandname'];
	$data['password'] = $_POST['password'];
	$data['is_admin'] = $_POST['isAdmin'];
	$data['date_created'] = date("Y-m-d H:i:s");
	
	$db->mquery_insert("tbl_users", $data, $connect);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create User</title>
</head>

<body>

<?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'createUser')); ?>

<label>Email</label>
<br />
<?php echo $formelem->text(array('id'=>'email','name'=>'email','placeholder'=>'email','class'=>'', 'value'=>'')); ?>
<br />
<label>Username</label>
<br />
<?php echo $formelem->text(array('id'=>'username','name'=>'username','placeholder'=>'username','class'=>'', 'value'=>'')); ?>
<br />
<label>Brand name</label>
<br />
<?php echo $formelem->text(array('id'=>'brandname','name'=>'brandname', 'placeholder'=>'brandname', 'class'=>'', 'value'=>'')); ?>
<br />
<label>Password</label>
<br />
<?php echo $formelem->password(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'')); ?>
<br />
<label>Is admin?</label>
<br />
<?php echo $formelem->checkbox(array('id'=>'isAdmin','name'=>'isAdmin','class'=>'', 'value'=>'0')); ?>

<br />
<?php echo $formelem->button(array('id'=>'btn-create','name'=>'btn-create','class'=>'', 'value'=>'create user')); ?>

<?php echo $formelem->close(); ?>

<script src="../js/jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){

		$('#isAdmin').click(function(){

			$(this).attr('value', this.checked ? 1 : 0)
		});

	});

</script>
</body>
</html>
