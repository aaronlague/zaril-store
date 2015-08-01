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
        <div class="form-group">
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
        </div>
        <div class="panel panel-violet">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-money fa-fw"></i>
						Sales List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Transaction #</th>
								<th>Time and Date of Purchase</th>								
								<th>Price</th>
								<th>Sales Tax 3%</th>
								<th>Total</th>
							</tr>
							<tr>
								<th>Transaction #</th>
								<th>Time and Date of Purchase</th>								
								<th>Price</th>
								<th>Sales Tax 3%</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>TSN001</td>
								<td>02/08/2015 00:00:00</td>								
								<td>P100.00</td>
								<td>P30.00</td>
								<td>P130.00</td>
							</tr>
							<tr>
								<td>TSN002</td>
								<td>03/08/2015 00:00:00</td>							
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN003</td>
								<td>04/08/2015 00:00:00</td>								
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN004</td>
								<td>04/08/2015 00:00:00</td>							
								<td>P160.00</td>
								<td>P48.00</td>
								<td>P208.00</td>
							</tr>
								<tr>
								<td>TSN005</td>
								<td>05/08/2015 00:00:00</td>								
								<td>P120.00</td>
								<td>P36.00</td>
								<td>P156.00</td>
							</tr>
								<tr>
								<td>TSN006</td>
								<td>05/08/2015 00:00:00</td>								
								<td>P250.00</td>
								<td>P75.00</td>
								<td>P325.00</td>
							</tr>
								<tr>
								<td>TSN007</td>
								<td>05/08/2015 00:00:00</td>								
								<td>P350.00</td>
								<td>P105.00</td>
								<td>P455.00</td>
							</tr>
								<tr>
								<td>TSN008</td>
								<td>06/08/2015 00:00:00</td>								
								<td>P820.00</td>
								<td>P246.00</td>
								<td>P1066.00</td>
							</tr>
								<tr>
								<td>TSN009</td>
								<td>07/08/2015 00:00:00</td>								
								<td>P820.00</td>
								<td>P246.00</td>
								<td>P1066.00</td>
							</tr>
								<tr>
								<td>TSN010</td>
								<td>07/08/2015 00:00:00</td>								
								<td>P500.00</td>
								<td>P150.00</td>
								<td>P650.00</td>
							</tr>
								<tr>
								<td>TSN011</td>
								<td>08/08/2015 00:00:00</td>								
								<td>P500.00</td>
								<td>P150.00</td>
								<td>P650.00</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th></th>
								<th class="total">Total</th>
								<th class="total">P3360.00</th>
								<th class="total">P1006.00</th>
								<th class="total">P4368.00</th>
							</tr>
						</tfoot>
					</table>
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
	<script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript">
            $(function() {
                $("#example1").dataTable({
                	"bSort": false,
                });
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
  </script>
  <script type="text/javascript">
$(document).ready(function(){
                $.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                $.datepicker.setDefaults($.datepicker.regional['']);
     /*$('#example1').dataTable()
		  .columnFilter({ sPlaceHolder: "head:before",
			aoColumns: [ { type: "text" },
				     { type: "date-range", sRangeFormat: "Between {from} and {to} dates" },
                     { type: "text"  },
                     { type: "text"  },
                     { type: "text"  }
				]

		});*/
$('#example1').dataTable()
		  .columnFilter({ 	sPlaceHolder: "head:before",
					aoColumns: [ 	{ type: "text" },
				    	 		{ type: "date-range" },
                                { type: "text" },
                                { type: "text" },
                                { type: "text" }
						]

		});
});

		</script>
</body>

</html>
