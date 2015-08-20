<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/models/items-sales-report.php';

$db = new db_config();
$formelem = new FormElem();
$ItemsSalesModel = new ItemsSalesModel();
$connect = $db->connect();
$brand_name = $_SESSION['brand_name'];
$id = $_SESSION['id'];
 

if(isset($_POST['change-password'])){


$id = $_POST['id'];
$password = $_POST['new-password'];

$user_update_sql = "UPDATE tbl_users SET password = '".$password."' WHERE id = '".$id."'";

$user_update = mysqli_query($connect, $user_update_sql) or die(mysqli_error($connect));
header('location: /logout.php');

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

    <title>Items Sales Report</title>

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

    <!-- JQuery-DataTables-ColumnFilter CSS -->
    <link href="css/demo_table.css" rel="stylesheet">

    <!-- jquery validation -->
    <link href="css/screen.css" rel="stylesheet" type="text/css" />
		
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

		<h1>Items Sales Report</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-tasks fa-fw"></i>
				Items Sales Report 
			</li>
		</ol>

        <!-- Page Data Grid -->
        <div class="panel panel-brown">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-money fa-fw"></i>
						Items Sales List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#" class="btn-print-report">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<?php echo '<table class="table table-bordered table-striped" id="example">';
					echo '<thead>';
                    echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					//echo '<th>Brand</th>';
					echo '<th>Item Code</th>';
					//echo '<th>Password</th>';
					//echo '<th>Item Code</th>';
					echo '<th>Price</th>';
					//echo '<th>Quantity</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';

					echo '<tr>';
					echo '<th>Transaction #</th>';
					echo '<th>DateTime of Purchase</th>';
					//echo '<th>Brand</th>';
					echo '<th>Item Code</th>';
					//echo '<th>Password</th>';
					//echo '<th>Item Code</th>';
					echo '<th>Price</th>';
					//echo '<th>Quantity</th>';
					echo '<th>Sales Tax</th>';
					echo '<th>Total</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $ItemsSalesModel->getItemsSales($connect);
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
	<script src="js/main.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.validate.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <script src="js/items-sales.js" type="text/javascript"></script>

  <script type="text/javascript">
$(document).ready(function(){
                $.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                $.datepicker.setDefaults($.datepicker.regional['']);
     $('#example').dataTable({
		"aoColumns": [ 
			{ "sWidth": "200px" },
			null,
			null
		]
	} )
		  .columnFilter({ sPlaceHolder: "head:before",
			aoColumns: [ { type: "text" },
				     { type: "date-range", sRangeFormat: "Between {from} and {to}"  },
                                     { type: "text" },
                                     { type: "text" },
                                     { type: "text" },
                                     { type: "text" }
				]

		});
		  $(".filterColumn input, .filter_column input").addClass('form-control input-group');
});

		</script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17838786-4']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

</script>    
	

</body>

</html>
