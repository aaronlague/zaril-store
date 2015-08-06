
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../images/logo-small.png" alt="logo"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php
                    echo $brand_name;
                    ?>
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-key"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?php echo $formelem->create(array('id'=>'logoutForm', 'name'=>'logoutForm', 'method'=>'post', 'action'=>'../logout.php')); ?>
                            <!--<button class="btn btn-primary btn-wide mll">Log out <span class="fui-exit"></span></button>-->
                            <a href="JAVASCRIPT:logoutForm.submit()"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            <?php echo $formelem->close(); ?>
                            
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>