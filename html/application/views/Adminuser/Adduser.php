<div class="content-wrapper" ng-controller="addusercontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Add User</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Dashboard</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">
			   
	           <form  id="adduser" name="adduser" ng-submit="adduserform()" novalidate >
                  <h3>Personal Information</h3>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.firstname.$invalid && !adduser.firstname.$pristine }">
					<label for="sel1">First Name:</label>
					<input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname" ng-model="firstname" required> 
					<p ng-show="adduser.firstname.$invalid && !adduser.firstname.$pristine" class="help-block">First Name is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.lastname.$invalid && !adduser.lastname.$pristine }">
					<label for="sel1">Last Name:</label>
					<input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname" ng-model="lastname" required> 
					<p ng-show="adduser.lastname.$invalid && !adduser.lastname.$pristine" class="help-block">Last Name is required.</p>
					
				</div>
				<!--<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.dob.$invalid && !adduser.dob.$pristine }">
					<label for="sel1">Date of Birth:</label>
					<input type="date" class="form-control" placeholder="DOB" id="dob" name="dob" ng-model="dob" required> 
					<p ng-show="adduser.dob.$invalid && !adduser.dob.$pristine" class="help-block">Last Name is required.</p>
					
				</div>-->
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.phone1.$invalid && !adduser.phone1.$pristine }">
					<label for="sel1">Phone:</label>
					<input type="number" class="form-control" placeholder="" id="phone1" name="phone1" ng-model="phone1"  required> 
					<p ng-show="adduser.phone1.$invalid && !adduser.phone1.$pristine" class="help-block">Phone Number is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.email.$invalid && !adduser.email.$pristine }">
					<label for="sel1">Email ID:</label>
					<input type="email" class="form-control" placeholder="" id="email" name="email" ng-model="email" required> 
					<p ng-show="adduser.email.$invalid && !adduser.email.$pristine" class="help-block">Email ID is required.</p>
					
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : adduser.user_type.$invalid && !adduser.user_type.$pristine }">
					  
								<label for="sel1">User Role:</label>
								
							 <select class="form-control"  id="user_type" name="user_type"  required ng-model="user_type"
								ng-options="opt.role_id as opt.roll_name for opt in roleslist">
							</select>
							
						<p ng-show="adduser.user_type.$invalid && !adduser.user_type.$pristine" class="help-block">User Type is required.</p>
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.username.$invalid && !adduser.username.$pristine }">
					<label for="sel1">Username:</label>
					<input type="text" class="form-control" placeholder="Username" id="username" name="username" ng-model="username" required> 
					<p ng-show="adduser.username.$invalid && !adduser.username.$pristine" class="help-block">Username is required.</p>
					<p ng-show="usernameexist">Username exist!</p>
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.password.$invalid && !adduser.password.$pristine }">
					<label for="sel1">Password:</label>
					<input type="password" class="form-control" placeholder="Password" id="password" name="password" ng-model="password" required> 
					<p ng-show="adduser.password.$invalid && !adduser.password.$pristine" class="help-block">Password is required.</p>
					
				</div>
				  
			  <div class="form-group" style="margin-top: 19px;">
				<div class="col-xs-4 pull-right">
						<button type="submit" class="btn btn-primary" ng-disabled="adduser.$invalid">Create User</button>
			   </div>
			  </div>
    </form>	
			   
			   
			   
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
 var app = angular.module("myApp",[]);
 app.controller('addusercontroller', function($scope,$http){
  $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/adminroles/get_roles',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.roleslist=data;
			  
			 
			
		});
	
			
	 $scope.adduserform=function()
	 {
		 console.log($scope.user_type);
		  console.log($scope.username);
		   console.log($scope.password);
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/adminuser/post_add_user',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({firstname:$scope.firstname,
		                        lastname:$scope.lastname,
								phone1:$scope.phone1,email:$scope.email,
								user_type:$scope.user_type,
								username:$scope.username,
								password:$scope.password,
								})
		 }).success(function(data){
			 console.log(data);
			 if(data==0)
 				 {
					 $scope.usernameexist=true;
				 }
				 else
					 
					 {
						 window.location.href="<?php echo base_url();?>index.php/adminuser";
					 
					 }
		 })
	 }
	 
	 
 })
 </script>