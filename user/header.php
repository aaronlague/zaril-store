
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>-->
                <a class="navbar-brand" href="#"><img src="../images/logo-small.png" alt="logo"/></a>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle capitalize" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php
                    echo $brand_name;                    
                    ?>
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li> -->
                        <li>
                            <a href="#" class="changepw"><i class="fa fa-fw fa-key"></i> Change Password</a>
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


<!-- Change Password Modal -->
    <div class="modal fade large" id="changePasswordModal" role="dialog">
        <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <?php echo $formelem->create(array('method'=>'post','class'=>'', 'id'=>'changePassword')); ?>   
        <div class="modal-body">        
            <div class="form-group">
                <input style="display:none" type="text" name="id" value="<?php echo $id;?>">
                <br />
                <label>New Password</label>
                <br />
                <?php echo $formelem->brandname(array('id'=>'new_password','type'=>'new_password','name'=>'new-password','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'4', 'required'=>'')); ?>
            </div> 
            <div class="form-group">
                <label>Confirm New Password</label>
                <br />
                <?php echo $formelem->brandname(array('id'=>'confirm_new_password','type'=>'confirm_new_password','name'=>'confirm_new_password','placeholder'=>'','class'=>'form-control', 'value'=>'', 'minlength'=>'4', 'required'=>'')); ?>
            </div>
            <!-- <p>
                <label for="password">Password</label>
                <input id="password" name="passwords" type="password">
            </p>
            <p>
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" name="confirm_password" type="password">
            </p> -->
            <!-- <div class="form-group pw">
                <label>Password</label>
                <br />
                <?php echo $formelem->brandname(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control', 'minlength'=>'4', 'required'=>'')); ?>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <?php echo $formelem->button(array('id'=>'change-password','name'=>'change-password','class'=>'btn btn-primary', 'value'=>'Save')); ?>
        </div>
     </div>
      <?php echo $formelem->close(); ?>
    </div>
    </div>
    <!-- end Change Password Modal -->