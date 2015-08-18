<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/models/users.php';

include '../tcpdf_include.php';

include '../../tcpdf.php';

//include '../../protected/config/db_config.php';

$db = new db_config();
$formelem = new FormElem();
$UsersModel = new UsersModel();
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

    <title>User Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 <!-- Data Tables -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Data Tables -->
	<link href="css/screen.css" rel="stylesheet" type="text/css" />

	<!-- JQuery DataTable Column Filter - Date Range filters  -->
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

        <div id="receipt">
            <div style="text-align:center; font-size:10px;">ZÁRIL lifestyle store</div>
            <div style="text-align:center; font-size:8px; border-bottom:1px solid black">
                97 Maginhawa st. Teacher's Village, Quezon City<br />
                Tel NO.:947-51-55 <br />
                TIN NO.:215-514-548-541
            </div>
            <div style="font-size:8px; border-bottom:1px solid black; margin: 0 auto; width: 200px;">

                 Item1 -------- 100.00 <br />
                Item2 -------- 100.00 <br />
                Item3 -------- 100.00 <br />
                Item4 -------- 100.00 <br />
                
			</div>
            <div style="font-size:8px; border-bottom:1px solid black">
                Sub-total -------- 100.00 <br />
                Total     -------- 100.00 <br />
            </div>
            <div style="font-size:8px; text-align:center;">          
                Thank you. Please come again<br />
                Like us on Facebook:<br />
                Zaril lifestyle store           
            </div>
			
        </div>
    <button class="btn-print-report" value="aa"></button>

</body>

<script src="js/jquery.js"></script>


<script type="text/javascript">
	

    $('.btn-print-report').click(function(){
    	var html = $('#receipt').html()
    	alert();
    	//location.href = '/tcpdf/reports/user-delivery-report.php?report_id='+deliveryReportId+'';

    	window.open('/tcpdf/receipt/receipt.php?html='+html+'', '_blank');

    });


</script>
</html>