<?php
session_start();

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/models/user-sales-report.php';

$db = new db_config();
$formelem = new FormElem();
$UsersSalesModel = new UsersSalesModel();
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

    <title>Sales Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Jquery-Ui CSS -->
    <link href="../css/jquery-ui.css" rel="stylesheet">

    <!-- JQuery-DataTables-ColumnFilter CSS -->
    <link href="../css/demo_table.css" rel="stylesheet">

		
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
					<!-- <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Transaction #</th>
								<th>Time and Date of Purchase</th>
								<th>Item Code</th>
								<th>Price</th>
								<th>Sales Tax 3%</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>TSN001</td>
								<td>11:43 PM 7/13/2015</td>
								<td>ITM1001</td>
								<td>P100.00</td>
								<td>P30.00</td>
								<td>P130.00</td>
							</tr>
							<tr>
								<td>TSN002</td>
								<td>11:40 PM 7/13/2015</td>
								<td>ITM1002</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN003</td>
								<td>11:40 PM 7/14/2015</td>
								<td>ITM1003</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN004</td>
								<td>11:48 PM 7/14/2015</td>
								<td>ITM1004</td>
								<td>P160.00</td>
								<td>P48.00</td>
								<td>P208.00</td>
							</tr>
								<tr>
								<td>TSN005</td>
								<td>08:40 PM 7/15/2015</td>
								<td>ITM1005</td>
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN006</td>
								<td>12:20 PM 7/15/2015</td>
								<td>ITM1007</td>
								<td>P250.00</td>
								<td>P75.00</td>
								<td>P325.00</td>
							</tr>
								<tr>
								<td>TSN007</td>
								<td>01:40 PM 7/15/2015</td>
								<td>ITM1008</td>
								<td>P350.00</td>
								<td>P105.00</td>
								<td>P455.00</td>
							</tr>
								<tr>
								<td>TSN008</td>
								<td>11:45 PM 7/15/2015</td>
								<td>ITM1009</td>
								<td>P820.00</td>
								<td>P246.00</td>
								<td>P1066.00</td>
							</tr>
								<tr>
								<td>TSN009</td>
								<td>11:49 PM 7/15/2015</td>
								<td>ITM1010</td>
								<td>P820.00</td>
								<td>P246.00</td>
								<td>P1066.00</td>
							</tr>
								<tr>
								<td>TSN010</td>
								<td>10:20 PM 7/16/2015</td>
								<td>ITM1011</td>
								<td>P500.00</td>
								<td>P150.00</td>
								<td>P650.00</td>
							</tr>
								<tr>
								<td>TSN011</td>
								<td>11:10 PM 7/16/2015</td>
								<td>ITM1012</td>
								<td>P500.00</td>
								<td>P150.00</td>
								<td>P650.00</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th class="total">Total</th>
								<th class="total">P3360.00</th>
								<th class="total">P1006.00</th>
								<th class="total">P4368.00</th>
							</tr>
						</tfoot>
					</table> -->
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
					echo $UsersSalesModel->getUsersSales($connect);
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

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="../js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <script src="../js/user-sales.js" type="text/javascript"></script>

	<script type="text/javascript">
            /*$(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });*/

	    /*$(function() {
		    $( "#datepickerFrom" ).datepicker({
		      showOn: "button",
		      buttonImage: "../images/calendar.jpg",
		      buttonImageOnly: true,
		      buttonText: "Select date"
		    });
		    $( "#datepickerTo" ).datepicker({
		      showOn: "button",
		      buttonImage: "../images/calendar.jpg",
		      buttonImageOnly: true,
		      buttonText: "Select date"
		    });
		  });*/
  </script>
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
