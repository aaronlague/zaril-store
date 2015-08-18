<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';
include '../protected/models/delivery.php';

$db = new db_config();
$formelem = new FormElem();
$deliveryModel = new DeliveryModel();
$connect = $db->connect();

$brand_name = $_SESSION['brand_name'];
$id = $_SESSION['id'];
$tax_percentage = 3;


if ($_SESSION['session_userid'] == '') {

    header("Location: /login.php?loggedin=false");
}


if(isset($_POST['change-password'])){

    
    $id = $_POST['id'];
    $password = $_POST['new-password'];

    $user_update_sql = "UPDATE tbl_users SET password = '".$password."' WHERE id = '".$id."'";

    $user_update = mysqli_query($connect, $user_update_sql) or die(mysqli_error($connect));
    header('location: /logout.php');

}

if(isset($_POST['btn-row'])){


$delivery_report_id = "DR" . rand(0, 100) . date("ymds");
$status = 'not submitted';
$date_created = date("Y-m-d H:i:s");
$details = $_POST['product_details'];
$item_code = $_POST['item_code'];

$price = $_POST['unit_price'];
$quantity = $_POST['quantity'];

$delivery_report_sql = "INSERT INTO tbl_delivery_report (delivery_report_id, brand_name, delivery_status, date_created) VALUES ('" .$delivery_report_id. "', '" .$brand_name. "', '" .$status. "', '" .$date_created. "')";

$delivery_report_query = mysqli_query($connect, $delivery_report_sql) or die(mysqli_error($connect));


	for ($i=0; $i<count($details); $i++) { 

		$delivery_id = "D" . rand(0, 1000) . date("ymds");
		$sales_tax = ($tax_percentage / 100) * $price[$i] * $quantity[$i];
	    $total_price = ($price[$i] * $quantity[$i]);

	   $delivery_item_sql = "INSERT INTO tbl_deliveries (delivery_id, delivery_report_id, brand_name, delivery_status, date_created, details, item_code, unit_price, quantity, quantity_received, sales_tax_amount, total_price) VALUES ('" .$delivery_id. "', '" .$delivery_report_id. "', '" .$brand_name. "', '" .$status. "', '" .$date_created. "', '" .$details[$i]. "', '" .$item_code[$i]. "', '" .$price[$i]. "', '" .$quantity[$i]. "', '" .$quantity[$i]. "', '" .$sales_tax. "' ,'" .$total_price. "')";

	   $delivery_item_query = mysqli_query($connect, $delivery_item_sql) or die(mysqli_error($connect));

	   header('location: /user/delivery.php?record_created=true');

	};

}

if(isset($_POST['add-item'])){


$delivery_report_id = $_POST['delivery_report_id']; 
$status = 'not submitted';
$date_created = date("Y-m-d H:i:s");
$details = $_POST['product_details'];
$item_code = $_POST['item_code'];

$price = $_POST['unit_price'];
$quantity = $_POST['quantity'];

$delivery_id = "D" . rand(0, 1000) . date("ymds");
$sales_tax = ($tax_percentage / 100) * $price * $quantity;
$total_price = ($price * $quantity);

//$delivery_report_sql = "INSERT INTO tbl_deliveries (delivery_report_id, brand_name, delivery_status, date_created) VALUES ('" .$delivery_report_id. "', '" .$brand_name. "', '" .$status. "', '" .$date_created. "')";
	$delivery_item_sql = "INSERT INTO tbl_deliveries (delivery_id, delivery_report_id, brand_name, delivery_status, date_created, details, item_code, unit_price, quantity, sales_tax_amount, total_price) VALUES ('" .$delivery_id. "', '" .$delivery_report_id. "', '" .$brand_name. "', '" .$status. "', '" .$date_created. "', '" .$details. "', '" .$item_code. "', '" .$price. "', '" .$quantity. "', '" .$sales_tax. "' ,'" .$total_price. "')";
	$delivery_report_query = mysqli_query($connect, $delivery_item_sql) or die(mysqli_error($connect));
	header('location: /user/delivery.php?record_created=true');
}


if(isset($_POST['update-record'])) {

	$delivery_item_id = $_POST['edit_delivery_item_id'];
	$item_code = $_POST['edit_item_code'];
	$item_details = $_POST['edit_product_details'];
	$item_price = $_POST['edit_unit_price'];
	$quantity = $_POST['edit_quantity'];

	$sales_tax_percentage = ($tax_percentage / 100) * $item_price;
	$sales_tax = $sales_tax_percentage * $quantity;

	$total_price = ($item_price * $quantity);

	$delivery_item_update_sql = "UPDATE tbl_deliveries SET item_code = '".$item_code."', details = '".$item_details."', unit_price = '".$item_price."', quantity = '".$quantity."', sales_tax_amount = '".$sales_tax."', total_price = '".$total_price."' WHERE delivery_id = '".$delivery_item_id."'";

	$delivery_item_update = mysqli_query($connect, $delivery_item_update_sql) or die(mysqli_error($connect));

	header('location: /user/delivery.php?record_updated=true');

}

if(isset($_POST['delete-record'])) {

	$delivery_item_id = $_POST['edit_delivery_item_id'];
	$item_code = $_POST['edit_item_code'];
	$item_details = $_POST['edit_product_details'];
	$item_price = $_POST['edit_unit_price'];
	$quantity = $_POST['edit_quantity'];

	$sales_tax_percentage = ($tax_percentage / 100) * $item_price;
	$sales_tax = $sales_tax_percentage * $quantity;

	$total_price = ($item_price * $quantity);

	$delivery_item_delete_sql = "DELETE from tbl_deliveries WHERE delivery_id = '".$delivery_item_id."'";

	$delivery_item_delete = mysqli_query($connect, $delivery_item_delete_sql) or die(mysqli_error($connect));

	header('location: /user/delivery.php?record_updated=true');

}

if(isset($_POST['delete-delivery'])) {

	$data_report_id = $_POST['delete_delivery_item_id'];



	$delivery_delivery_delete_sql = "DELETE from tbl_deliveries WHERE delivery_report_id = '".$data_report_id."'";

	$delivery_delivery_delete = mysqli_query($connect, $delivery_delivery_delete_sql) or die(mysqli_error($connect));

	header('location: /user/delivery.php?record_updated=true');

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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- jquery validation -->
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!--header-->
	<?php include("../header.php"); ?>
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
			<button class="btn btn-primary addDelivery" type="button"><i class="fa fa-file fa-fw"></i>Create Delivery Report</button>
		</div>
        <div class="panel panel-green">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-truck fa-fw"></i>
						Delivery List
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
					echo '<th>Deliver ID</th>';
					echo '<th>Status</th>';
					echo '<th>Date Created</th>';
					echo '<th>Details</th>';
					echo '<th>Quantity</th>';
					echo '<th>Item Code</th>';
					echo '<th>Unit Price</th>';
					echo '<th>Sales Tax Amount</th>';
					echo '<th>Total Price</th>';
					echo '<th></th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $deliveryModel->getDeliveries($brand_name,'tbl_deliveries', $connect);
					echo '</tbody>';
					echo '</table>';
					?>
				</div><!-- /.box-body -->
			</div>
		</div>
                <!-- /.row -->

        <hr>

        <!--footer-->
		<?php include("../footer.php"); ?>
		<!--/footer-->

	<!-- Create Delievery Modal -->
	<div class="modal fade large delivery-form" id="createDeliveryModal" role="dialog">
	    <div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Delivery</h4>
	    </div>
	    <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'createDelivery')); ?>	
	    <div class="modal-body">
	    <div class="form-group">	
			<table id="deliveryTable">
				<thead>
					<tr>
						<td style="width:50px;">No.</td>
						<td>
							Item Code
						</td>
						<td>
							Details of Product
						</td>
						<td>
							Price
						</td>
						<td>
							QTY
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>
							<?php echo $formelem->text(array('id'=>'item_code','name'=>'item_code[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'product_details','name'=>'product_details[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'unit_price[]','name'=>'unit_price[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'1', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'quantity','name'=>'quantity[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'1', 'required'=>'')); ?>
						</td>
					</tr>
				</tbody>
			</table>	
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-success addRow">Add Row</button>
			<button type="button" class="btn btn-success removeRow">Remove Row</button>
		</div>
		
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      <?php echo $formelem->button(array('id'=>'btn-row','name'=>'btn-row','class'=>'btn btn-primary', 'value'=>'Create')); ?>
	    </div>
	 </div>
	  <?php echo $formelem->close(); ?>
	</div>
	</div>
	<!-- end Delievery Modal -->

	<!-- Add Item Modal -->
	<div class="modal fade large delivery-form" id="addItemModal" role="dialog">
	    <div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Add Item</h4>
	    </div>
	    <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'createDelivery')); ?>	
	    <div class="modal-body">
	    <div class="form-group">	
			<table id="deliveryTable">
				<thead>
					<tr>
						<td style='display:none;'><input id='delivery_report_id' name='delivery_report_id' class='form-control' type='hidden' value=''></td>
						<td style="width:50px;">No.</td>
						<td>
							Item Code
						</td>
						<td>
							Details of Product
						</td>
						<td>
							Price
						</td>
						<td>
							QTY
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>
							<?php echo $formelem->text(array('id'=>'item_code','name'=>'item_code','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'product_details','name'=>'product_details','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'unit_price','name'=>'unit_price','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'1', 'required'=>'')); ?>
						</td>
						<td>
	                        <?php echo $formelem->text(array('id'=>'quantity','name'=>'quantity','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'1', 'required'=>'')); ?>
						</td>
					</tr>
				</tbody>
			</table>	
		</div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      <?php echo $formelem->button(array('id'=>'add-item','name'=>'add-item','class'=>'btn btn-primary', 'value'=>'add-item')); ?>
	    </div>
	 </div>
	  <?php echo $formelem->close(); ?>
	</div>
	</div>
	<!-- end Add Item Modal -->

	<!-- View/Edit Delievery Modal -->
	<div class="modal fade large delivery-form" id="viewEditDelieveryModal" role="dialog">
	    <div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">View/Edit</h4>
	    </div>
	    <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'viewEditDelivery')); ?>	
	    <div class="modal-body">
	    <div class="form-group">
	    <p>
	    	<a href='#' class='editBtn btn btn-sm btn-success' type='button'><i class='fa fa-pencil fa-fw'></i>Edit</a>
	    </p>	
			<table>
				<thead>
					<tr>
						<td>
							Item Code
						</td>
						<td>
							Details of Product
						</td>
						<td>
							Price
						</td>
						<td>
							QTY
						</td>
					</tr>
				</thead>
				<tbody>
					<tr id="deliveryFields">
						<!-- <td>
							<?php //echo $formelem->text(array('id'=>'edit_item_code','name'=>'item_code[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled' )); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_product_details','name'=>'product_details[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_unit_price','name'=>'unit_price[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_quantity','name'=>'quantity[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td> -->
					</tr>
				</tbody>
			</table>
		</div>
	    </div>
	    <div class="modal-footer">
	      <?php echo $formelem->button(array('id'=>'update-record','name'=>'update-record','class'=>'btn btn-primary edit-btn-row', 'value'=>'update', 'disabled'=>'disabled' )); ?>
	      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      

	    </div>
	 </div>
	  <?php echo $formelem->close(); ?>
	</div>
	</div>
	<!-- View/Edit Delievery Modal -->

	<!-- Delete Delievery Item Modal -->
	<div class="modal fade large delivery-form" id="deleteDelieveryItemModal" role="dialog">
	    <div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Delete Item</h4>
	    </div>
	    <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'viewEditDelivery')); ?>	
	    <div class="modal-body">
	    <div class="form-group">
	    <div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Are you sure you want to delete this item?
		</div>	
			<table class="display-border">
				<thead>
					<tr>
						<th>
							Item Code
						</th>
						<th>
							Details of Product
						</th>
						<th>
							Price
						</th>
						<th>
							QTY
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id="daleteFields">
						<!-- <td>
							<?php //echo $formelem->text(array('id'=>'edit_item_code','name'=>'item_code[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled' )); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_product_details','name'=>'product_details[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_unit_price','name'=>'unit_price[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_quantity','name'=>'quantity[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td> -->
					</tr>
				</tbody>
			</table>
		</div>
	    </div>
	    <div class="modal-footer">
	      <?php echo $formelem->button(array('id'=>'delete-record','name'=>'delete-record','class'=>'btn btn-primary edit-btn-row', 'value'=>'Yes')); ?>
	      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
	      

	    </div>
	 </div>
	  <?php echo $formelem->close(); ?>
	</div>
	</div>
	<!-- end Delete Delievery Item Modal -->

	<!-- Delete Delievery Modal -->
	<div class="modal fade large delivery-form" id="deleteDelieveryModal" role="dialog">
	    <div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Delete Delivery Report</h4>
	    </div>
	    <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'viewEditDelivery')); ?>	
	    <div class="modal-body">
	        <div class="form-group">
	        <div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Are you sure you want to delete this delivery report?
			</div>	
			<table class="display-border">
				<thead>
					<tr>
						<th>
							Item Code
						</th>
						<th>
							Details of Product
						</th>
						<th>
							Price
						</th>
						<th>
							QTY
						</th>
					</tr>
				</thead>
				<tbody id="deleteDeliveryFields">
					
						<!-- <td>
							<?php //echo $formelem->text(array('id'=>'edit_item_code','name'=>'item_code[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled' )); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_product_details','name'=>'product_details[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_unit_price','name'=>'unit_price[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td>
						<td>
						                            <?php //echo $formelem->text(array('id'=>'edit_quantity','name'=>'quantity[]','placeholder'=>'','class'=>'form-control', 'value'=>'', 'disabled'=>'disabled')); ?>
						</td> -->
					
				</tbody>
			</table>
					
			</div>
	    </div>
	    <div class="modal-footer">
	      <?php echo $formelem->button(array('id'=>'delete-delivery','name'=>'delete-delivery','class'=>'btn btn-primary', 'value'=>'Yes')); ?>
	      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
	      

	    </div>
	 </div>
	  <?php echo $formelem->close(); ?>
	</div>
	</div>
	<!-- end Delete Delievery Modal -->

		<!-- /.modal -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery.validate.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="../js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="../js/jquery.dataTables.rowGrouping.js" type="text/javascript"></script>
    <script src="../js/jquery.confirm.js" type="text/javascript"></script>
    <script src="../js/user-delivery.js" type="text/javascript"></script>
</body>

</html>
