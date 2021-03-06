<?php

session_start();

/*include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';*/

include '../protected/config/db_config.php';
include '../protected/config/html_config.php';
include '../protected/library/validation_library.php';
include '../protected/controllers/index.php';


$db = new db_config();
$formelem = new FormElem();

$connect = $db->connect();

$brand_name = $_SESSION['brand_name'];
$id = $_SESSION['id'];

/*$db = new db_config();
$formelem = new FormElem();

$brand_name = $_SESSION['brand_name'];
$id = $_SESSION['id'];
*/

if ($_SESSION['session_userid'] == '') {

    header("Location: /login.php?loggedin=false");
}

if ($_SESSION['session_is_admin'] == 1) {

    header("Location: /index.php?redirected=true");
}


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

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jquery validation -->
    <link href="../css/screen.css" rel="stylesheet" type="text/css" />

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

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Zaril's Sales and Inventory System</p>
            <p><a href="http://www.zaril.net/" class="btn btn-primary btn-large">Go to main site</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Brand Name: <span class="capitalize"><?php echo $brand_name; ?></span></h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        
        <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">                                        
                                        <i class="fa fa-truck fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Delivery</div>
                                        <div>Report</div>
                                    </div>
                                </div>
                            </div>
                            <a href="delivery.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Go</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-violet">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Sales</div>
                                        <div>Report</div>
                                    </div>
                                </div>
                            </div>
                            <a href="sales.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Go</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
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
    <script src="../js/jquery.validate.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
