<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tenant</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/fonts/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="myApp">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
   <!-- <a href="javascript:void(0);" class="logo">
      <img height="40" src="<?php echo base_url();?>images/hims_logo.png">
    </a>-->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- <li class="dropdown user user-menu">
             <a href="#" data-toggle="modal" data-target="#change"><i class="fa fa-key" aria-hidden="true"></i>Change Password</a>  
          </li> -->
          <li class="dropdown user user-menu">
           <a href="<?php echo base_url();?>index.php/Login/logout"><i class="fa fa-sign-out"></i>Logout</a> 
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li -->
        </ul>
      </div>

    </nav>
  </header>
</div>
<!-- ./wrapper -->

<!--  Change Password Model-->

 <div class="example-modal">
        <div class="modal fade" tabindex="-1" id="change" name="change">
          <div class="modal-dialog modal-sm ui-corner-all">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
                
                <div class="modal-body">
                <div id="alert123" name="alert123" role="alert" style="display:none;" >                    
                </div>
                  <form name="changeForm" id="changeForm">
                    <div class="form-group" id="div111">  
                        <label for="recipient-name" class="form-control-label">Current password</label>       
                        <input type="text" class="form-control" id="curr_pswd" name="curr_pswd"/> 
                    </div>  
                     <div class="form-group" id="div112">  
                        <label for="recipient-name" class="form-control-label">New password</label>       
                        <input type="text" class="form-control" id="new_pswd" name="new_pswd"/> 
                    </div>  
                     <div class="form-group" id="div113">  
                        <label for="recipient-name" class="form-control-label">Confirm password</label>       
                        <input type="text" class="form-control" id="conf_pswd" name="conf_pswd"/> 
                    </div>                            
                  </form>
                </div>
               <div class="modal-footer">
                <button type="button" id="closemodel11" name="closemodel11" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary has-spinner" onclick="changePassword();" 
                id="changingPassword"><span  id="hide_name">Submit</span></button>
              </div>
            </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
     <!-- /Chnage Password -->
    </div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url();?>AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>AdminLTE/dist/js/app.min.js"></script>





</body>
</html>
