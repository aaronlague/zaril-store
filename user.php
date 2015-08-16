<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/models/users.php';

$db = new db_config();
$formelem = new FormElem();
$UsersModel = new UsersModel();
$connect = $db->connect();
$brand_name = $_SESSION['brand_name'];

if(isset($_POST['btn-create'])){

	
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];;
	$data['brand_name'] = $_POST['brandname'];
	$data['password'] = $_POST['password'];
	$data['is_admin'] = $_POST['isAdmin'];
	$data['date_created'] = date("Y-m-d H:i:s");
	
	$db->mquery_insert("tbl_users", $data, $connect);

}

if(isset($_POST['update-record'])) {



	$id = $_POST['id'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$brandname = $_POST['brandname'];
	$is_admin = $_POST['isadmin'];

	$user_item_update_sql = "UPDATE tbl_users SET id = '".$id."', email = '".$email."', username = '".$username."', brand_name = '".$brandname."' WHERE id = '".$id."'";

	$user_item_update = mysqli_query($connect, $user_item_update_sql) or die(mysqli_error($connect));

	header('location: /user.php?record_updated=true');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Data Tables -->
	<link href="css/screen.css" rel="stylesheet" type="text/css" />

	<!-- JQuery DataTable Column Filter - Date Range filters  -->
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!--header-->
	<?php include("header.php"); ?>
	<!--/header-->

    <!-- Page Content -->
    <div class="container">

		<h1>User Account</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-users fa-fw"></i>
				User Account
			</li>
		</ol>

        <!-- Page Data Grid -->
        <div class="form-group">
			<button class="btn btn-primary addUser" type="button"><i class="fa fa-user fa-fw"></i>Add New User</button>
		</div>
        <div class="panel panel-skyblue">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-users fa-fw"></i>
						User Account List
					</h3>
					
					<!-- <h3 class="panel-title pull-right">
						<a href="#">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3> -->
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<?php echo '<table class="table table-bordered table-striped" id="example1">';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Email</th>';
					echo '<th>User Name</th>';
					//echo '<th>Brand</th>';
					echo '<th>Brand Name</th>';
					//echo '<th>Password</th>';
					//echo '<th>Item Code</th>';
					echo '<th>User Role</th>';
					//echo '<th>Quantity</th>';
					echo '<th>Action</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $UsersModel->getUsers($connect);
					echo '</tbody>';
					echo '</table>';
					?>
				</div><!-- /.box-body -->
			</div>
		</div>
                <!-- /.row -->

        <hr>

        <!--footer-->
		<?php include("footer.php"); ?>
		<!--/footer-->

	<!-- User Modal -->
  <div class="modal fade large add-user-form" id="UserModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
			<?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'createUser')); ?>

			<div class="form-group">
				<label>Email</label>
				<br />
				<?php echo $formelem->email(array('id'=>'email','name'=>'email','placeholder'=>'email','class'=>'form-control', 'value'=>'', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Username</label>
				<br />
				<?php echo $formelem->username(array('id'=>'username','name'=>'username','placeholder'=>'username','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Brand name</label>
				<br />
				<?php echo $formelem->brandname(array('id'=>'brandname','name'=>'brandname', 'placeholder'=>'brandname', 'class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group pw">
				<label>Password</label>
				<br />
				<?php echo $formelem->brandname(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control', 'minlength'=>'4', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Is admin?</label>
				<br />
				<?php echo $formelem->checkbox(array('id'=>'isAdmin','name'=>'isAdmin','class'=>'', 'value'=>'0')); ?>
			</div>
			
			<?php echo $formelem->button(array('id'=>'btn-create','name'=>'btn-create','class'=>'btn btn-primary', 'value'=>'create user')); ?>
			<?php echo $formelem->close(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>          
		  
        </div>
		
     </div>
      
    </div>
  </div>
 <!-- end User Modal -->

<!-- edit User Modal -->
  <div class="modal fade large add-user-form" id="editUserModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>   
        <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'editUser')); ?>     
        <div id="userFields" class="modal-body">
			

			<!-- <div class="form-group">
				<label>Email</label>
				<br />
				<?php echo $formelem->email(array('id'=>'email','name'=>'email','placeholder'=>'email','class'=>'form-control', 'value'=>'', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Username</label>
				<br />
				<?php echo $formelem->username(array('id'=>'username','name'=>'username','placeholder'=>'username','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Brand name</label>
				<br />
				<?php echo $formelem->brandname(array('id'=>'brandname','name'=>'brandname', 'placeholder'=>'brandname', 'class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group pw">
				<label>Password</label>
				<br />
				<?php echo $formelem->brandname(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control', 'minlength'=>'4', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Is admin?</label>
				<br />
				<?php echo $formelem->checkbox(array('id'=>'isAdmin','name'=>'isAdmin','class'=>'', 'value'=>'0')); ?>
			</div> -->
			
			
			
        </div>
        
        <div class="modal-footer">
          <?php echo $formelem->button(array('id'=>'update-record','name'=>'update-record','class'=>'btn btn-primary', 'value'=>'update')); ?>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>          
		  
        </div>
		<?php echo $formelem->close(); ?>
     </div>
      
    </div>
  </div>
 <!-- end edit User Modal -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>

    <script src="js/user-account.js"></script>

	
</body>

</html>