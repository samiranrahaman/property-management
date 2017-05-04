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
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.dob.$invalid && !adduser.dob.$pristine }">
					<label for="sel1">Date of Birth:</label>
					<input type="date" class="form-control" placeholder="DOB" id="dob" name="dob" ng-model="dob" required> 
					<p ng-show="adduser.dob.$invalid && !adduser.dob.$pristine" class="help-block">Last Name is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.phone1.$invalid && !adduser.phone1.$pristine }">
					<label for="sel1">Home Phone:</label>
					<input type="number" class="form-control" placeholder="" id="phone1" name="phone1" ng-model="phone1"  required> 
					<p ng-show="adduser.phone1.$invalid && !adduser.phone1.$pristine" class="help-block">Phone Number is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.email.$invalid && !adduser.email.$pristine }">
					<label for="sel1">Email ID:</label>
					<input type="email" class="form-control" placeholder="" id="email" name="email" ng-model="email" required> 
					<p ng-show="adduser.email.$invalid && !adduser.email.$pristine" class="help-block">Email ID is required.</p>
					
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : adduser.user_type.$invalid && !adduser.user_type.$pristine }">
				  
							<label for="sel1">User Type:</label>
							
						 <select class="form-control"  id="user_type" name="user_type"  required ng-model="user_type"
							ng-options="opt.id as opt.name for opt in usertypelist">
						</select>
						
					<p ng-show="adduser.user_type.$invalid && !adduser.user_type.$pristine" class="help-block">User Type is required.</p>
				</div>
				  <h3>Property Information</h3>
				  <div class="form-group"  ng-class="{ 'has-error' : adduser.property_name.$invalid && !adduser.property_name.$pristine }">
				  
							<label for="sel1">Property:</label>
							
						 <select class="form-control"  id="property_name" name="property_name"  required ng-model="property_name"
							ng-options="opt.id as opt.name for opt in propertylist"
							ng-change='propertydetails()' >
						</select>
						
					<p ng-show="adduser.property_name.$invalid && !adduser.property_name.$pristine" class="help-block">Property is required.</p>
				  </div>
				  <div ng-show="propertydetails_div" class="row" style="padding: 0 0 52px 17px;background-color: #d2dce2;">
				      <h4> Property Details</h4>
				      <div class="col-sm-2">{{p_name}}</div> 
					  <div class="col-sm-2">{{p_address}}</div>
					   <div class="col-sm-2">{{p_name}}</div>
				  </div>
				 
				 <!-- 
   
				  <div class="form-group"  ng-class="{ 'has-error' : suppliercost.productlist.$invalid && !suppliercost.productlist.$pristine }">
				  
							<label for="sel1">Select Product:</label>
							
						 <select class="form-control"  id="productlist" name="productlist"  required ng-model="productSelected"
							ng-options="opt as opt.label for opt in options">
						</select>
						
					<p ng-show="suppliercost.productlist.$invalid && !suppliercost.productlist.$pristine" class="help-block">Product is required.</p>
				  </div>-->
   
	  
	  
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
			url : '<?php echo base_url();?>index.php/user/get_user_type',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.usertypelist=data;
			  
			 
			
		});
	 $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/property/get_property_list',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.propertylist=data;
			 
			
		});
			
	 $scope.adduserform=function()
	 {
		 console.log($scope.property_name);
		 console.log($scope.user_type);
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/user/post_add_user',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({firstname:$scope.firstname,lastname:$scope.lastname,dob:$scope.dob,
								phone1:$scope.phone1,email:$scope.email,
								user_type:$scope.user_type,
								property_name:$scope.property_name})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/user";
				 }
		 })
	 }
	 
	 $scope.propertydetails=function ()
	 {
		 //console.log($scope.property_name);
		 $http({
			method : 'post',
			url : '<?php echo base_url();?>index.php/property/get_property_details',
	        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data :JSON.stringify({p_id:$scope.property_name})
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);
			 $scope.p_name=data[0].name;
			 $scope.p_address=data[0].address;
			 $scope.propertydetails_div=true;
			 //$scope.p_name=data.name;
			}); 
	 }
 })
 </script>