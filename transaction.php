<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/controllers/index.php';
include 'protected/models/transaction-items-display.php';

$db = new db_config();
$formelem = new FormElem();
$transactionItemsModel = new TransactionItemsModel();
$connect = $db->connect();

$brand_name = $_SESSION['brand_name'];

if(isset($_POST['btn-finish'])){
	
	$sales_transaction_id = "ST" . rand(0, 100) . date("ymds");
	$subtotal = $_POST['subtotal'];
	$sales_tax = $_POST['total_sales_tax'];
	$total_amount = $_POST['total_amount'];
	$amount_given = $_POST['amount_given'];
	$change_amount = $_POST['change_amount'];
	$transaction_date = date("Y-m-d H:i:s");

	
	$brand_name_item = $_POST['brand_name'];
	$item_code = $_POST['item_code'];
	$item_description = $_POST['description'];
	$price = $_POST['price'];
	$sales_tax_amount = $_POST['sales_tax'];
	$total_sales_price = $_POST['total'];
	$transaction_date = date("Y-m-d H:i:s");


	$sales_transaction_report_sql = "INSERT INTO tbl_sales_trans_report (sales_transaction_id, subtotal, sales_tax_total, total_amount, amount_given, change_amount, transaction_date) VALUES ('".$sales_transaction_id."', '".$subtotal."', '".$sales_tax."', '".$total_amount."', '".$amount_given."', '".$change_amount."', '".$transaction_date."')";

	$sales_transaction_report_query = mysqli_query($connect, $sales_transaction_report_sql) or die(mysqli_error($connect));

	//echo $sales_transaction_report_sql;

	for ($i=0; $i<count($brand_name_item); $i++) {

		$sales_transaction_item_id = "ST" . rand(0, 1000) . date("ymds");

		$sales_transaction_item_sql = "INSERT INTO tbl_sales_trans (sales_transaction_item_id, sales_transaction_id, brand_name, item_code, item_description, transaction_date, price, sales_tax_amount, total_sales_price) VALUES ('".$sales_transaction_item_id."', '".$sales_transaction_id."', '".$brand_name_item[$i]."', '".$item_code[$i]."', '".$item_description[$i]."', '".$transaction_date."', '".$price[$i]."', '".$sales_tax_amount[$i]."', '".$total_sales_price[$i]."')";

		$sales_transaction_item_query = mysqli_query($connect, $sales_transaction_item_sql) or die(mysqli_error($connect));

		//echo $sales_transaction_item_sql;
	}

	for ($i=0; $i<count($sales_transaction_id); $i++) {

		$count_item_sql = "SELECT sales_transaction_id, item_code, COUNT( * ) AS sold FROM tbl_sales_trans WHERE sales_transaction_id = '".$sales_transaction_id."' GROUP BY item_code";

		$count_item_query = mysqli_query($connect, $count_item_sql) or die(mysqli_error($connect));

		$data = '';
		
		while ($row = mysqli_fetch_array($count_item_query)) {

			//print_r($row);
			$sales_transaction_id = $row['sales_transaction_id'];
			$item_code = $row['item_code'];
			$sold = $row['sold'];

			$data .= $sales_transaction_id;
			$data .= $item_code;
			$data .= $sold;

			$sql = "UPDATE tbl_deliveries SET quantity = (quantity - $sold) WHERE item_code = '".$item_code."'";
		  	$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
		}

	}

	header('location: /transaction.php?transaction_saved=true');

	//echo $sales_transaction_report_sql;
	//echo $sales_transaction_item_sql;

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

    <title>Transaction</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	

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

		<h1>Transaction</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-shopping-cart fa-fw"></i>
				Transaction
			</li>
		</ol>
		
        <!-- Page Data Grid -->
        <div class="form-group">
			<label>Enter Product Code</label>
			<input id="item-code" class="form-control auto-width">
			<button class="btn btn-success btn-go-add" type="button">Go <i class="fa fa-arrow-right"></i></button> 
		</div>
        <div class="panel panel-yellow">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-shopping-cart fa-fw"></i>
						Transaction
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<table id="transactionTable" class="table table-bordered table-striped">
						<tfoot>
				            <tr>
				                <th colspan="3" style="text-align:right">Total:</th>
				                <th class="price-col"></th>
				                <th class="tax-col"></th>
				                <th class="total-price-col"></th>
				            </tr>
				        </tfoot>
						<thead>
							<tr>
								<th>Brand</th>
								<th>Item Code</th>
								<th>Details of Product</th>
								<th>Price</th>
								<th>Sales Tax 3%</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<!-- <tr class="odd"><td class="">brand6</td><td class="">RXSHX</td><td class="">Rockshox Pike</td><td class="">6000.00</td><td class="">135.00</td><td class="">9135.00</td><td class=""><button class="btn btn-primary btn-remove-item" data-dismiss="modal" type="button">Remove</button></td></tr>
							<tr class="odd"><td class="">brand6</td><td class="">RXSHX</td><td class="">Rockshox Pike</td><td class="">6000.00</td><td class="">135.00</td><td class="">9135.00</td><td class=""><button class="btn btn-primary btn-remove-item" data-dismiss="modal" type="button">Remove</button></td></tr>
							<tr class="odd"><td class="">brand6</td><td class="">RXSHX</td><td class="">Rockshox Pike</td><td class="">6000.00</td><td class="">135.00</td><td class="">9135.00</td><td class=""><button class="btn btn-primary btn-remove-item" data-dismiss="modal" type="button">Remove</button></td></tr> -->
						</tbody>
					</table>
					
					<div class="row">
					<?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'saveSalesTransaction')); ?>
						<div class="text-center">
							<div class="panel panel-default">
								<div class="panel-body" style="width:50%; margin:0 auto;"> 
									<div class="form-group sub-total"><label>Sub Total:</label>
										<?php echo $formelem->text(array('id'=>'subtotal','name'=>'subtotal','placeholder'=>'','class'=>'form-control', 'value'=>'')); ?>
									</div>
									<div class="form-group sales-tax"><label>Sales Tax:</label>
										<?php echo $formelem->text(array('id'=>'total_sales_tax','name'=>'total_sales_tax','placeholder'=>'','class'=>'form-control', 'value'=>'')); ?>
									</div>
									<div class="form-group total-amount"><label>Total:</label>
										<?php echo $formelem->text(array('id'=>'total_amount','name'=>'total_amount','placeholder'=>'','class'=>'form-control', 'value'=>'')); ?>
									</div>
								</div>								
							</div>
							<div class="form-group">
								<label>Amount Given</label>
								<input id="amount_given" name="amount_given" class="form-control auto-width" minlength="1" required="">
							</div>
							<div class="form-group">
								<label>Change</label>
								<input id="change_amount" name="change_amount" class="form-control auto-width left45">
							</div>
						</div>
						<div class="items-row">
							<table></table>
						</div>
						<div class="pull-right">
							<?php echo $formelem->button(array('id'=>'btn-finish','name'=>'btn-finish','class'=>'btn btn-primary big', 'value'=>'Finish', 'style'=>'margin-right: 5px')); ?> 
								<!-- <button id="btnFinish" class="btn btn-primary btn-finish big" data-dismiss="modal" type="button">Finish</button> -->
							<button class="btn-print-report btn btn-success big" value="Print">Print</button>
							<button class="btn btn-danger big cancel" data-dismiss="modal" type="button">Cancel</button>
						</div>
					<?php echo $formelem->close(); ?>
					</div>
					
					

					<div id="receipt" style="display:none;">
			            <div style="text-align:center; font-size:10px;">ZÁRIL lifestyle store</div>
			            <div style="text-align:center; font-size:8px; border-bottom:1px solid black">
			                97 Maginhawa st. Teacher's Village, Quezon City<br />
			                Tel NO.:947-51-55 <br />
			                TIN NO.:215-514-548-541
			            </div>
			            <div class="printableItems" style="font-size:8px; border-bottom:1px solid black; margin: 0 auto; width: 200px;">

			                <table>
			                </table>
			                
						</div>
			            <div class="printableTotals" style="font-size:8px; border-bottom:1px solid black">
			            	<table>
			            		<tr>
			            			<td>Sub-total</td>
			            			<td class="r_subtotal">------<span></span></td>
			            			
			            		</tr>
			            		<tr>
			            			<td>Total</td>
			            			<td class="r_total">------<span></span></td>
			            		</tr>
			                </table>
			                <!-- Sub-total -------- 100.00 <br />
			                Total     -------- 100.00 <br /> -->
			            </div>
			            <div style="font-size:8px; text-align:center;">          
			                Thank you. Please come again<br />
			                Like us on Facebook:<br />
			                Zaril lifestyle store           
			            </div>
						
			        </div>

				</div><!-- /.box-body -->
			</div>
		</div>
                <!-- /.row -->
        <hr>

        <!--footer-->
		<?php include("footer.php"); ?>
		<!--/footer-->
		
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
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/transaction.js" type="text/javascript"></script>

</body>

</html>
