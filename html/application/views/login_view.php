
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tenant| Sign in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/AdminLTE.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body class="hold-transition login-page" ng-app="myApp" ng-controller="formCtrl">
<div class="login-box" >
  
  <div class="login-box-body">
    <p class="login-box-msg">Tenant Admin Console</br>Sign in</p>
    
		<div class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Login failed! Try Again...</strong>
		 </div>
   <form  id="loginForm" name="loginForm" ng-submit="loginformsubmit()" novalidate >
   
      
   
      <div class="form-group"  ng-class="{ 'has-error' : loginForm.username.$invalid && !loginForm.username.$pristine }">
        <input type="text" class="form-control" placeholder="User Name" id="username" name="username" ng-model="user.username" required >
		    <p ng-show="loginForm.username.$invalid && !loginForm.username.$pristine" class="help-block">Username is required.</p>
        
      </div> 
      <div class="form-group has-feedback" ng-class="{ 'has-error' : loginForm.passwrd.$invalid && !loginForm.passwrd.$pristine }">
        <input type="password" class="form-control" placeholder="Password" id="passwrd" name="passwrd" ng-model="user.passwrd" required>    
		<p ng-show="loginForm.passwrd.$invalid && !loginForm.passwrd.$pristine" class="help-block">Passwrd is required.</p>
        
      </div>
      <div class="row">
       
        <div class="col-xs-6 pull-left">
           <a href="#" id="forgot_password" name="forgot_password" data-toggle="modal" data-target="#DeleteMenu"> Forgot Password
           </a>
        </div>
        <div class="col-xs-4 pull-right">
		        <button type="submit" class="btn btn-primary" ng-disabled="loginForm.$invalid">Sign In</button>
        </div>
    </form>
	
	
	
	
 </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
var app = angular.module("myApp", []);
app.controller("formCtrl", function($scope,$http) {
  
  $scope.loginformsubmit = function () {
	if ($scope.loginForm.$valid) {
				$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/login/verify_login',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data :JSON.stringify({username:$scope.user.username, passwrd:$scope.user.passwrd})
			}).success(function(data) {
				console.log(data);
				 console.log(data.status);
				 //alert(data.status);
                 if(data.status==1)
				 {
					  window.location.href="<?php echo base_url();?>index.php/dashboard";
				 }
				 else
				 {
					 $scope.validationError = true;
				 }
				
				

			});
					
					
					
			}
  }
  
  
  $scope.ShowHide = function () {
                //If DIV is hidden it will be visible and vice versa.
                $scope.validationError = $scope.validationError ? false : true;
            }
  
  
  
  
  
  
});
</script>
</body>
</html>
