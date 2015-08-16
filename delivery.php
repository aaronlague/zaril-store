<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/controllers/index.php';
include 'protected/models/delivery-admin.php';

$db = new db_config();
$formelem = new FormElem();
$deliveryModel = new DeliveryModel();

$connect = $db->connect();

if(isset($_POST['btn-save'])){

	$delivery_report_id = $_POST['delivery_report_id'];
	$status = $_POST['status'];
	$quantity_received = $_POST['quantity_received'];
	$timestamp = date("Y-m-d H:i"); //$_POST['currentTimeDate'];

	$update_delivery_report_sql = "UPDATE tbl_delivery_report SET delivery_status = '".$status."', quantity_received = '".$quantity_received."', date_accepted = '".$timestamp."' WHERE delivery_report_id = '".$delivery_report_id."'";

	$delivery_report_query = mysqli_query($connect, $update_delivery_report_sql) or die(mysqli_error($connect));


	$update_deliveries_sql = "UPDATE tbl_deliveries SET delivery_status = '".$status."', date_accepted = '".$timestamp."' WHERE delivery_report_id = '".$delivery_report_id."'";

	$deliver_query = mysqli_query($connect, $update_deliveries_sql) or die(mysqli_error($connect));

	header('location: /delivery.php?report_status_updated=true');

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

    <title>Delivery Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

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

		<h1>Delivery Report</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-truck"></i>
				Delivery Report
			</li>
		</ol>
		
        <!-- Page Data Grid -->
        <div class="form-group">
			<div class="row">
				<div class="col-md-3 col-offset-3">
					<label>Select Brand</label>
					<select class="form-control">
						<?php 
						$sqlList = "SELECT DISTINCT brand_name FROM tbl_deliveries";
						$query = mysqli_query($connect, $sqlList) or die(mysqli_error($connect));
						while ($row = mysqli_fetch_array($query)){
						echo "<option value=". $row['brand_name'] .">" . $row['brand_name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="col-md-3 col-offset-3">
					<label>Select Brand</label>
					<select class="status form-control">
						<option value="Pending">Pending</option>
						<option value="Accepted">Accepted</option>
					</select>
				</div>
			</div>
		</div>
        <div class="panel panel-green">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-truck fa-fw"></i>
						Delivery List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive" id="deliveryList">
					
				</div><!-- /.box-body -->
			</div>
		</div>
                <!-- /.row -->

        <hr>

        <!--footer-->
		<?php include("footer.php"); ?>
		<!--/footer-->


	<div class="modal fade large add-user-form" id="editModal" role="dialog">
		<div class="modal-dialog">    
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'updateDeliveryStatus')); ?>
			<div class="modal-body">
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option>Accepted</option>
						<option>Pending</option>
					</select>
				</div>
				<div class="form-group">
					<label>QTY Received</label>
					<input name='quantity_received' id='quantity_received' class="form-control" type="text" placeholder="" minlength="1" required="">
				</div>
				<div class="form-group">
					<label for="disabledSelect">Current time and Date</label>
					<input id="currentTimeDate" name="currentTimeDate" class="form-control" type="text" disabled="" placeholder="">
				</div>
			</div>
			<?php echo $formelem->hidden(array('id'=>'delivery_report_id','name'=>'delivery_report_id','placeholder'=>'','class'=>'', 'value'=>'')); ?>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				<?php echo $formelem->button(array('id'=>'btn-save','name'=>'btn-save','class'=>'btn btn-primary', 'value'=>'Save')); ?>
			</div>
			<?php echo $formelem->close(); ?>
			</div>
      
		</div>
	</div>
		<!-- /.modal -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
	<script src="js/main.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="js/admin-delivery.js" type="text/javascript"></script>
</body>

</html>
