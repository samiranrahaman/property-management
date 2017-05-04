<div class="content-wrapper" ng-controller="addservicescontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Add Services</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Services</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
         <a href="<?php echo base_url();?>index.php/services/add_services_type"><h4>Add services type</h4></a> 
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-8 col-centered col-min">
			   
	           <form  id="addservices" name="addservices" ng-submit="addservicesform()" novalidate >
                 
				<div class="form-group has-feedback" ng-class="{ 'has-error' : addservices.services_name.$invalid && !addservices.services_name.$pristine }">
					<label for="sel1">Name:</label>
					<input type="text" class="form-control" placeholder="Services Name" id="services_name" name="services_name" ng-model="services_name" required> 
					<p ng-show="addservices.services_name.$invalid && !addservices.services_name.$pristine" class="help-block">Name is required.</p>
					
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addservices.services_type.$invalid && !addservices.services_type.$pristine }">
				  
							<label for="sel1">Services Type:</label>
							
						 <select class="form-control"  id="services_type" name="services_type"  required ng-model="services_type"
							ng-options="opt.id as opt.name for opt in serviceslist">
						</select>
						
					<p ng-show="addServices.services_type.$invalid && !addServices.services_type.$pristine" class="help-block">Services Type is required.</p>
				</div>
				  
				<div class="form-group">
					<div class="col-xs-4 pull-right">
							<button type="submit" class="btn btn-primary" ng-disabled="addservices.$invalid">Create Services</button>|
							<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/services">Back</a>
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
 app.controller('addservicescontroller', function($scope,$http){
  $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/services/get_services_type',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.serviceslist=data;
			 
			
		});
	
		
		
	
	 $scope.addservicesform=function()
	 {
		 //alert($scope.services_name);
		 
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/services/post_services_data',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({services_name:$scope.services_name,services_type:$scope.services_type,})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/services";
				 }
		 })
	 }
 })
 </script>