<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>
<div class="content-wrapper" ng-controller="serviceslistcontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Services List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Services</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
       <a href="<?php echo base_url();?>index.php/services/add_services"><h4>Add services</h4></a>    
	<div class="container">
			<div class="row row-centered">
			                         <div class="col-xs-8 col-centered col-min" style="position: absolute;">
										<div modal="showModal" close="cancel()" class="modal-content" style="background-color: white;">
										<form  id="serviceedit" name="serviceedit" ng-submit="serviceeditsubmit()" novalidate >
											<div class="modal-header">
											<h4>Edit Services</h4>
											</div>
											<div class="modal-body">
												
												 <div class="form-group has-feedback" ng-class="{ 'has-error' : serviceedit.title_edit.$invalid && !serviceedit.title_edit.$pristine }">
													<input type="text" class="form-control" placeholder="Type Name" id="title_edit" name="title_edit" ng-model="title_edit" required> 
													<p ng-show="serviceedit.title_edit.$invalid && !serviceedit.title_edit.$pristine" class="help-block">Name is required.</p>
													
												  </div>
												  <div class="form-group"  ng-class="{ 'has-error' : serviceedit.services_type.$invalid && !serviceedit.services_type.$pristine }">
													  
														<label for="sel1">Services Type:</label>
																
															 <select class="form-control"  id="services_type" name="services_type"  required ng-model="services_type" ng-value="services_type"
																ng-options="opt.id as opt.name for opt in servicestypelist">
															</select>
															
														<p ng-show="serviceedit.services_type.$invalid && !serviceedit.services_type.$pristine" class="help-block">Services Type is required.</p>
												 </div>
												  <input type="hidden" class="form-control"  id="service_id" name="service_id" ng-model="service_id" required> 
													
													
												 
												
											</div>
											<div class="modal-footer">
											  <button class="btn btn-success" ng-disabled="serviceedit.$invalid" ng-click="ok()">Update</button>
											  <button class="btn" ng-click="cancel()">Cancel</button>
											</div>
										</form>
										</div>
									</div>
									
									 <div class="col-xs-12 col-centered col-min" style="width:85%";>
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											   <div class="col-sm-3">Name</div>
											   <div class="col-sm-3">Type</div>
											   <div class="col-sm-3">Create at</div>
												<div class="col-sm-3">Action</div>
										         
										</div>
										
										<div class="row " ng-repeat="item in serviceslist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
										  <div class="col-sm-3">{{item.service_name}}</div>
										   <div class="col-sm-3">{{item.service_type}}</div>
										   <div class="col-sm-3">{{item.created_at}}</div>
										   <div class="col-sm-3">
											
											<button class="btn btn-primary"  ng-click="delete(item.id)">Delete</button>|
											<button class="btn btn-primary" ng-click="edit(item.id,item.service_name,item.type)">Edit</button></div>
											</div>
										     <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;" ng-show="!serviceslist.length">No Result Found!</div>    
										</div>
										
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
 var app = angular.module("myApp",["ui.bootstrap.modal"]);
 app.controller("serviceslistcontroller",function($scope,$http,$window){
	 $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/services/get_services_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.serviceslist=data;
	 });
	  $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/services/get_services_type',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.servicestypelist=data;
			 
			
		});
	
	          $scope.edit = function (id,name,type) {
				  $scope.showModal = true;
				  //console.log(name);
				   $scope.title_edit =name;
					$scope.service_id = id;
					$scope.services_type = type;
					
					
			  }
			  $scope.cancel = function() {
				  $scope.showModal = false;
				};

				
	$scope.serviceeditsubmit=function()
	{
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/services/update_services',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({name:$scope.title_edit,service_id:$scope.service_id,services_type:$scope.services_type})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/services";
				 }
				 /* else
				 {
					 $scope.validationError = true;
				 }  */
				
			});
	}		
				
  $scope.delete = function (str) 
       {
		  // alert(str);
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/services/services_list_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/services";
				 }
				 else
				 {
					 //$scope.validationError = true;
				 } 
				
			});
	  
      }   
			   
    }
	 
 });
 </script>