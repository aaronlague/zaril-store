<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/controllers/index.php';
include 'protected/models/admin-sales-report.php';

$db = new db_config();
$formelem = new FormElem();
$brand_name = $_SESSION['brand_name'];
$SalesModel = new SalesModel();
$connect = $db->connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Jquery-Ui CSS -->
    <link href="css/jquery-ui.css" rel="stylesheet">

   
		
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

		<h1>Sales Report</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-money fa-fw"></i>
				Sales Report 
			</li>
		</ol>

        <!-- Page Data Grid -->
        <!-- <div class="form-group">
        	<div class="row">
				  <div class="col-md-3">
				  		<label>From</label>
		                <div class='input-group date' id='datetimepicker'>
		                    <input type='text' class="form-control auto-width" id="datepickerFrom"/>
		                </div>
				  </div>
				  <div class="col-md-9">
				  		<label>To</label>
		                <div class='input-group date' id='datetimepicker'>
		                    <input type='text' class="form-control auto-width" id="datepickerTo"/>
		                </div>
				  </div>
			</div>
        </div> -->
        <div class="panel panel-violet">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-money fa-fw"></i>
						Sales List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#" class="btn-print-report">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<!-- <div id="demo">
	                	<?php echo '<table class="table table-bordered table-striped" id="example">';
					echo '<thead>';
                    echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					echo '<th>Price</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';

					echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					echo '<th>Price</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $SalesModel->getSales($connect);
					echo '</tbody>';
					echo '</table>';
					?>
                	</div> -->
                	<div id="demo">
 			<?php echo '<table class="table table-bordered table-striped" id="example">';
                    echo '<thead>';
                    echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					echo '<th>Price</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';

					echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					echo '<th>Price</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';
					echo '</thead>';

                    echo '<tbody>';
					echo $SalesModel->getSales($connect);
					echo '</tbody>';
					echo '</table>';
					echo '<tfoot>';
					echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					echo '<th>Price</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
                    echo '</tr>';    
                    echo '</tfoot>';            
					?>

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
	<!--<script src="js/jquery-ui.js"></script>
	-->
	<script src="js/admin-sales.js"></script>
    <!-- Bootstrap Core JavaScript -->    
    <script src="js/bootstrap.min.js"></script>

	<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
	 <script src="demo/js/jquery-ui.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	
    
    <script src="demo/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    


    <!--<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="demo/js/jquery.dataTables.js" type="text/javascript"></script>

    <script src="demo/js/jquery-ui.js" type="text/javascript"></script>

    <script src="demo/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>-->


            

</script>
</body>

</html>
