<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/controllers/index.php';


$db = new db_config();
$formelem = new FormElem();

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
			<input class="form-control auto-width">
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
					<table id="example1" class="table table-bordered table-striped">
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
							<tr>
								<td>Brand1</td>
								<td>ITM1001</td>
								<td>Women Sandals</td>
								<td>P100.00</td>
								<td>P30.00</td>
								<td>P130.00</td>
								<td class="text-center">
									<a href="#">
										<i class="fa fa-remove remove"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Brand2</td>
								<td>ITM1002</td>
								<td>Accessories</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
								<td class="text-center">
									<a href="#">
										<i class="fa fa-remove remove"></i>
									</a>
								</td>
							</tr>
							<tr>
								<td>Brand3</td>
								<td>ITM1002</td>
								<td>Accessories</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
								<td class="text-center">
									<a href="#">
										<i class="fa fa-remove remove"></i>
									</a>
								</td>
							</tr>							
						</tbody>
					</table>

					<div class="row">

						<div class="text-center">
							<div class="panel panel-default">
								<div class="panel-body"> 
									<div> Sub Total: P340.00 </div>
									<div> Sales Tax: P102.00 </div>
									<div id="totalAmount">Total: P442.00</div>
								</div>								
							</div>
							<div class="form-group">
								<label>Amount Given</label>
								<input id="amountGiven" class="form-control auto-width">
							</div>
							<div class="form-group">
								<label>Change</label>
								<input id="change" class="form-control auto-width left45" disabled="">
							</div>
						</div>
						<div class="pull-right">
								<button id="btnFinish" class="btn btn-primary big" data-dismiss="modal" type="button">Finish</button>
								<button class="btn btn-danger big cancel" data-dismiss="modal" type="button">Cancel</button>
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
            });

			$('.cancel').on( 'click', function () {
                $('tbody').remove();
            } );

			
			
			$('#btnFinish').on( 'click', function () {
				var totalAmount = $("#totalAmount").html().replace(/total:|P|.00/gi, '');
				var amountGiven = $("#amountGiven").val();
				
				var t = parseFloat(totalAmount);
				var a = parseFloat(amountGiven)

				var change = a - t;
				
				$('#change').attr('value', change)

				console.log(change);
                if(a == ""){
					alert("Fill up");
				}else if(t <= a){
					
					alert("transaction successful!");
				}
				else{
					alert("Amount given is less than total amount");
				}
            } );
			
	</script>

</body>

</html>
