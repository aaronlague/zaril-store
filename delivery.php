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

//$validationlib = new validationLibrary();
//$indexController = new IndexController();

$connect = $db->connect();

if(isset($_POST['btn-row'])){

$tax_percentage = 3;
$price = $_POST['unit_price'];
$quantity = $_POST['quantity'];

$sales_tax = ($tax_percentage / 100) * $price;

$total_price = ($price * $quantity) + $sales_tax;

//echo "<br />" . $sales_tax . "<br />";
//echo "<br />" . $total_price . "<br />";

//	$data['id'] = '1';
	$data['delivery_id'] = rand() . date("Ymd");
	$data['brand_name'] = 'brand6';
	$data['delivery_status'] = 'pending';
	$data['date_created'] = date("Y-m-d H:i:s");
	$data['details'] = $_POST['product_details'];
	$data['item_code'] = 'test';
	$data['unit_price'] = $_POST['unit_price']; 
	$data['quantity'] = $_POST['quantity'];
	$data['sales_tax_amount'] = $sales_tax; 
	$data['total_price'] = $total_price; 
	$db->mquery_insert("tbl_deliveries", $data, $connect);
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
			<div class="modal-body">
				<div class="form-group">
					<label>Status</label>
					<select class="form-control">
						<option>Accepted</option>
						<option>Pending</option>
					</select>
				</div>
				<div class="form-group">
					<label>QTY Received</label>
					<input class="form-control" type="text" placeholder="10">
				</div>
				<div class="form-group">
					<label for="disabledSelect">Current time and Date</label>
					<input id="currentTimeDate" class="form-control" type="text" disabled="" placeholder="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
			</div>
      
		</div>
	</div>
		<!-- /.modal -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/main.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });

                var autoLoadDeliveryList = function(){
                	var brand_name = $('select.form-control').val();
                	$.ajax({
				    	  url: '../ajax/load-brands.php?brand_name=' + brand_name,
						  method: "POST",
						  success: function(data){
						  	var showResult = $('#deliveryList').load('../ajax/load-brands.php?brand_name='+brand_name+'' );
						  	return showResult;
						  	console.log('load brands');

					  	}
	                });
                }

                autoLoadDeliveryList();

                $('select.form-control').change(function(){

                	autoLoadDeliveryList();

            	});

			$('.editBtn').on( 'click', function () {
                $('#editModal').modal('show');
            } );


			var d = new Date();
			var n = d.getMonth();
			var month = n + 1 ;
			var time = d.getHours() + ":" + d.getMinutes() + " " + month + "/" + d.getDate() + "/" + d.getFullYear();
			//document.getElementById("currentTimeDate").innerHTML = time;

			$('#currentTimeDate').attr('placeholder' , time);
		});
	</script>
</body>

</html>
