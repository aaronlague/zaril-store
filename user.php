<?php
session_start();

include 'protected/config/db_config.php';
include 'protected/config/html_config.php';
include 'protected/library/validation_library.php';
include 'protected/models/users.php';

$db = new db_config();
$formelem = new FormElem();
$UsersModel = new UsersModel();
$connect = $db->connect();

if(isset($_POST['btn-create'])){

	
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];;
	$data['brand_name'] = $_POST['brandname'];
	$data['password'] = $_POST['password'];
	$data['is_admin'] = $_POST['isAdmin'];
	$data['date_created'] = date("Y-m-d H:i:s");
	
	$db->mquery_insert("tbl_users", $data, $connect);

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

    <!--header-->
	<?php include("header.php"); ?>
	<!--/header-->

    <!-- Page Content -->
    <div class="container">

		<h1>User Account</h1>
        <hr>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Home</a>
			</li>
			<li class="active">
				<i class="fa fa-users fa-fw"></i>
				User Account
			</li>
		</ol>

        <!-- Page Data Grid -->
        <div class="form-group">
			<button class="btn btn-primary addUser" type="button"><i class="fa fa-user fa-fw"></i>Add New User</button>
		</div>
        <div class="panel panel-skyblue">
				<div class="panel-heading">
					<h3 class="panel-title" style="width:500px">
						<i class="fa fa-users fa-fw"></i>
						User Account List
					</h3>
					
					<h3 class="panel-title pull-right">
						<a href="#">
							<i class="fa fa-print fa-fw"></i>Print
						</a>
					</h3>
				</div>
			<div class="panel-body">
				<div class="box-body table-responsive">
					<?php echo '<table class="table table-bordered table-striped" id="example1">';
					echo '<thead>';
					echo '<tr>';
					echo '<th>Email</th>';
					echo '<th>User Name</th>';
					//echo '<th>Brand</th>';
					echo '<th>Brand Name</th>';
					//echo '<th>Password</th>';
					//echo '<th>Item Code</th>';
					echo '<th>User Role</th>';
					//echo '<th>Quantity</th>';
					echo '<th>Action</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					echo $UsersModel->getUsers($connect);
					echo '</tbody>';
					echo '</table>';
					?>
				</div><!-- /.box-body -->
			</div>

			<div id="demo">
 <table id="example" class="display dataTable">
                    <thead>
                        <tr>
                            <th style="width:150px">Company name</th>
                            
                            <th style="width:350px">Date Created</th>
                            <th style="width:250px">Date Updated</th>

                        </tr>
                        <tr>
                            <th>Company name</th>
                            
                            <th>Date Created</th>
                            <th>Date Updated</th>
                        </tr>
                    </thead>

                    <tbody> 
                        <tr>
                            <td>Emkay Entertainments</td>
                            
                            <td>28/05/2015</td>
                            <td>25/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>The Empire</td>

                            
                            <td>16/06/2015</td>
                            <td>10/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Asadul Ltd</td>
                            
                            <td>13/07/2015</td>
                            <td>12/09/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Gargamel ltd</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Ashley Mark</td>
                            
                            <td>15/07/2015</td>
                            <td>25/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>MuchMoreMusic Studios</td>
                            
                            <td>02/07/2015</td>

                            <td>24/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Victoria Music Ltd</td>
                            
                            <td>21/07/2015</td>
                            <td>19/08/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Abacus Agent</td>
                            
                            <td>08/06/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Atomic</td>

                            
                            <td>09/06/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Pyramid Posters</td>
                            
                            <td>30/07/2015</td>
                            <td>14/10/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Kingston Smith Ltd</td>
                            
                            <td>06/08/2015</td>
                            <td>04/09/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Garrett Axford PR</td>
                            
                            <td>06/07/2015</td>
                            <td>28/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Derek Boulton Management</td>
                            
                            <td>12/08/2015</td>

                            <td>22/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>(TCM)</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Billy Russell Management</td>
                            
                            <td>14/08/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Stage Audio Services</td>

                            
                            <td>22/07/2015</td>
                            <td>15/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Windsong International</td>
                            
                            <td>21/06/2015</td>
                            <td>18/09/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Vivante Music Ltd</td>
                            
                            <td>19/05/2015</td>
                            <td>14/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Way to Blue</td>
                            
                            <td>29/07/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Glasgow City Halls</td>
                            
                            <td>10/07/2015</td>

                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>The List</td>
                            
                            <td>07/07/2015</td>
                            <td>14/09/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Wilkinson Turner King</td>
                            
                            <td>26/07/2015</td>
                            <td>08/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>GSC Solicitors</td>

                            
                            <td>03/06/2015</td>
                            <td>24/06/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Vanessa Music Co</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Regent Records</td>
                            
                            <td>05/06/2015</td>
                            <td>25/08/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>BBC Radio Lancashire</td>
                            
                            <td>11/08/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>The Citadel Arts Centre</td>
                            
                            <td>22/05/2015</td>

                            <td>10/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Villa Audio Ltd</td>
                            
                            <td>07/08/2015</td>
                            <td>12/09/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Astra travel</td>
                            
                            <td>09/06/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Idle Eyes Printshop</td>

                            
                            <td>20/06/2015</td>
                            <td>06/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Miggins Music (UK)</td>
                            
                            <td>07/06/2015</td>
                            <td>16/06/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Magic 999</td>
                            
                            <td>15/08/2015</td>
                            <td>19/08/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Delga Group</td>
                            
                            <td>03/07/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Zane Music</td>
                            
                            <td>15/05/2015</td>

                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Universal Music</td>
                            
                            <td>05/07/2015</td>
                            <td>06/07/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Gotham Records</td>
                            
                            <td>23/05/2015</td>
                            <td>27/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Timbuktu Music Ltd</td>

                            
                            <td>31/07/2015</td>
                            <td>09/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Online Music</td>
                            
                            <td>18/07/2015</td>
                            <td>03/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Irish Music Magazine</td>
                            
                            <td>29/07/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Savoy Records</td>
                            
                            <td>31/05/2015</td>
                            <td>06/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Temple Studios</td>
                            
                            <td>16/08/2015</td>

                            <td>04/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Gravity Shack Studio</td>
                            
                            <td>27/05/2015</td>
                            <td>30/07/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Dovehouse Records</td>
                            
                            <td>02/08/2015</td>
                            <td>22/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Citysounds Ltd</td>

                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Revolver Music Publishing</td>
                            
                            <td>04/08/2015</td>
                            <td>25/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Jug Of Ale</td>
                            
                            <td>12/06/2015</td>
                            <td>26/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Isles FM 103</td>
                            
                            <td>01/07/2015</td>
                            <td>08/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Headscope</td>
                            
                            <td>28/06/2015</td>

                            <td>02/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Universal Music Ireland</td>
                            
                            <td>09/06/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Zander Exports</td>
                            
                            <td>19/08/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Midem (UK)</td>

                            
                            <td>17/07/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>La Rocka Studios</td>
                            
                            <td>16/06/2015</td>
                            <td>10/07/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Warner Home DVD</td>
                            
                            <td>24/05/2015</td>
                            <td>24/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Music Room</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Blue Planet</td>
                            
                            <td>26/05/2015</td>

                            <td>06/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Dream 107.7FM</td>
                            
                            <td>02/07/2015</td>
                            <td>24/09/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Moneypenny Agency</td>
                            
                            <td>01/06/2015</td>
                            <td>30/06/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Artsun</td>

                            
                            <td>08/06/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Clyde 2</td>
                            
                            <td>29/07/2015</td>
                            <td>23/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>9PR</td>
                            
                            <td>30/07/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>River Studio&#39;s</td>
                            
                            <td>17/06/2015</td>
                            <td>16/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Start Entertainments Ltd</td>

                            
                            <td>06/07/2015</td>
                            <td>28/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Vinyl Tap Mail Order Music</td>
                            
                            <td>23/06/2015</td>
                            <td>03/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Passion Music</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>SuperVision Management</td>
                            
                            <td>25/06/2015</td>
                            <td>25/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Lite FM</td>
                            
                            <td>22/07/2015</td>

                            <td>15/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>ISIS Duplicating Company</td>
                            
                            <td>10/08/2015</td>
                            <td>07/11/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Vanderbeek &amp; Imrie Ltd</td>
                            
                            <td>19/05/2015</td>
                            <td>14/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Glamorgan University</td>
                            
                            <td>09/06/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Web User</td>
                            
                            <td>10/07/2015</td>

                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Farnborough Recreation Centre</td>
                            
                            <td>18/05/2015</td>
                            <td>26/07/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Robert Owens</td>
                            
                            <td>26/07/2015</td>
                            <td>08/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Magick Eye Records</td>

                            
                            <td>23/07/2015</td>
                            <td>13/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Alexandra Theatre</td>
                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Keda Records</td>
                            
                            <td>25/07/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Independiente Ltd</td>
                            
                            <td>11/08/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Shurwood Management</td>
                            
                            <td>11/07/2015</td>

                            <td>29/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Fury Records</td>
                            
                            <td>07/08/2015</td>
                            <td>12/09/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Northumbria University</td>
                            
                            <td>29/07/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Pop Muzik</td>

                            
                            <td>20/06/2015</td>
                            <td>06/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Jonsongs Music</td>
                            
                            <td>27/07/2015</td>
                            <td>05/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>Hermana PR</td>
                            
                            <td>15/08/2015</td>
                            <td>19/08/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Sugarcane Music</td>
                            
                            <td>22/08/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>JFM Records</td>
                            
                            <td>15/05/2015</td>

                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Black Market Records</td>
                            
                            <td>16/05/2015</td>
                            <td>17/05/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Float Your Boat Productions</td>
                            
                            <td>23/05/2015</td>
                            <td>27/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Creation Management</td>

                            
                            <td>11/06/2015</td>
                            <td>20/06/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Bryter Music</td>
                            
                            <td>18/07/2015</td>
                            <td>03/08/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>The Headline Agency</td>
                            
                            <td>09/06/2015</td>
                            <td>04/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>MP Promotions</td>
                            
                            <td>31/05/2015</td>
                            <td>06/07/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Modo Production Ltd</td>
                            
                            <td>27/06/2015</td>

                            <td>15/08/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Nomadic Music</td>
                            
                            <td>27/05/2015</td>
                            <td>30/07/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Reverb Records Ltd</td>
                            
                            <td>13/06/2015</td>
                            <td>02/09/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>SIBC</td>

                            
                            <td>15/05/2015</td>
                            <td>15/05/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Marken Time Critical Express</td>
                            
                            <td>15/06/2015</td>
                            <td>06/07/2015 00:00:00</td>

                        </tr>
                        <tr>
                            <td>102.2 Smooth FM</td>
                            
                            <td>12/06/2015</td>
                            <td>26/07/2015 00:00:00</td>
                        </tr>
                        <tr>

                            <td>Chesterfield Arts Centre</td>
                            
                            <td>20/08/2015</td>
                            <td>28/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>The National Indoor Arena</td>
                            
                            <td>28/06/2015</td>

                            <td>02/10/2015 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Salisbury City Hall</td>
                            
                            <td>29/07/2015</td>
                            <td>23/08/2015 00:00:00</td>
                        </tr>

                        <tr>
                            <td>Minder Music</td>
                            
                            <td>19/08/2015</td>
                            <td>14/10/2015 00:00:00</td>
                        </tr>
                    </tbody>
                    <tfoot>

                        <tr>
                            <th>Company name</th>
                          
                            <th>Date Created</th>
                            <th>Date Updated</th>
                        </tr>
                    </tfoot>
                </table>


			</div>
			<div class="spacer"></div>

		</div>
                <!-- /.row -->

        <hr>

        <!--footer-->
		<?php include("footer.php"); ?>
		<!--/footer-->

	<!-- User Modal -->
  <div class="modal fade large add-user-form" id="UserModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
			<!--<form action="#">
				<div class="form-group">					
					<label>User ID</label>	
					<input type="text" placeholder="" id="userId" class="form-control" disabled="">
				</div>
				<div class="form-group">		
					<label>User Account</label>
					<input type="text" placeholder="" id="userAccount" class="form-control">
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" placeholder="" id="userName" class="form-control">
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" placeholder="" id="userAddress" class="form-control">
				</div>
				<div class="form-group">
					<label>Contact Number</label>
					<input type="text" placeholder="" id="userContact" class="form-control">
				</div>
			</form>	-->

			<?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'createUser')); ?>

			<div class="form-group">
				<label>Email</label>
				<br />
				<?php echo $formelem->email(array('id'=>'email','name'=>'email','placeholder'=>'email','class'=>'form-control', 'value'=>'', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Username</label>
				<br />
				<?php echo $formelem->username(array('id'=>'username','name'=>'username','placeholder'=>'username','class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group">
				<label>Brand name</label>
				<br />
				<?php echo $formelem->brandname(array('id'=>'brandname','name'=>'brandname', 'placeholder'=>'brandname', 'class'=>'form-control', 'value'=>'', 'minlength'=>'2', 'required'=>'')); ?>
			</div>
			<div class="form-group pw">
				<label>Password</label>
				<br />
				<?php echo $formelem->password(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control')); ?>
			</div>
			<div class="form-group">
				<label>Is admin?</label>
				<br />
				<?php echo $formelem->checkbox(array('id'=>'isAdmin','name'=>'isAdmin','class'=>'', 'value'=>'0')); ?>
			</div>
			
			<?php echo $formelem->button(array('id'=>'btn-create','name'=>'btn-create','class'=>'btn btn-primary', 'value'=>'create user')); ?>
			<?php echo $formelem->close(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>          
		  
        </div>
		
     </div>
      
    </div>
  </div>
 <!-- end User Modal -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
			$('.modal').close();
		}
	});
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

			$('.editBtn').on( 'click', function () {
                $('#UserModal').modal('show');
            } );
            $('.addUser').on( 'click', function () {
                $('#UserModal').modal('show');
            } );

			$( "#example1 tr .editBtn" ).each(function(index) {
				$(this).on('click', function(){
					$('#UserModal').modal('show');
					
					var email = $("#example1 tr td.userEmail").html();
					var name = $("#example1 tr td.userName").html();
					var brandname = $("#example1 tr td.userBrandName").html();
					var role = $("#example1 tr td.userRole").html();
					

					console.log(email);
					

					$('#UserModal #email').attr('placeholder' , email);
					$('#UserModal #username').attr('placeholder' , name);
					$('#UserModal #brandname').attr('placeholder' , brandname);
					//$('#UserModal #password').attr('placeholder' , address);
					$('#UserModal #isAdmin').attr('checked' , role);
				});   
			});

			$(document).ready(function(){
				$("#createUser").validate();
				
				$('#isAdmin').click(function(){

					$(this).attr('value', this.checked ? 1 : 0)
				});
				

			});
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
				     { type: "date-range", sRangeFormat: "Between {from} and {to} dates" },
                                     { type: "date-range", sRangeFormat: "Between {from} and {to}"  }
				]

		});
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