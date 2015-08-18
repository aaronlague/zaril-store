<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/models/tenant-sales-report.php';


$db = new db_config();
$formelem = new FormElem();
$TenantsSalesModel = new TenantsSalesModel();
$connect = $db->connect();
$brand_name = $_SESSION['brand_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tenant Sales Report</title>

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

		<h1>Tenant Sales Report</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-line-chart"></i>
				Tenant Sales Report
			</li>
		</ol>

        <!-- Page Data Grid -->
        <div class="form-group">			
			<div class="row">
				<div class="col-md-3">
					<label>Select Brand</label>
					<select id="select-brand" class="form-control">						
						<?php 
						$sqlList = "SELECT DISTINCT brand_name FROM tbl_deliveries";
						$query = mysqli_query($connect, $sqlList) or die(mysqli_error($connect));
						while ($row = mysqli_fetch_array($query)){
						echo "<option value=". $row['brand_name'] .">" . $row['brand_name'] . "</option>";
						}
						?>			
					</select>
				</div>
				  <!-- <div class="col-md-3">
				  		<label>From</label>
		                <div class='input-group date' id='datetimepicker'>
		                    <input type='text' class="form-control auto-width" id="datepickerFrom"/>
		                </div>
				  </div>
				  <div class="col-md-6">
				  		<label>To</label>
		                <div class='input-group date' id='datetimepicker'>
		                    <input type='text' class="form-control auto-width" id="datepickerTo"/>
		                </div>
				  </div> -->
			</div>
		</div>
        <div class="panel panel-red">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-line-chart fa-fw"></i>
						Tenant Sales List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#" class="btn-print-report">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<?php echo '<table class="table table-bordered table-striped" id="example1">';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Brand</th>';
					echo '<th>Sales Tax 3%</th>';
					echo '<th>Total</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $TenantsSalesModel->getTenanstSales($connect);
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

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<!--<script src="js/main.js"></script>-->
	<script src="js/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
    <script src="js/tenant-sales.js" type="text/javascript"></script>

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

            $(function() {
			    $( "#datepickerFrom" ).datepicker({
			      showOn: "button",
			      buttonImage: "images/calendar.jpg",
			      buttonImageOnly: true,
			      buttonText: "Select date"
			    });
			    $( "#datepickerTo" ).datepicker({
			      showOn: "button",
			      buttonImage: "images/calendar.jpg",
			      buttonImageOnly: true,
			      buttonText: "Select date"
			    });
			  });

            $(document).ready(function() {
			/* Initialise datatables */
			    var oTable = $('#example1').dataTable();

		    /* Add event listener to the dropdown input */
		    $('#select-brand').change( function() { oTable.fnFilter( $(this).val() ); } );

		   });
	</script>
</body>

</html>
