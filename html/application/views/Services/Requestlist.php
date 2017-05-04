<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>
<div class="content-wrapper" ng-controller="serviceslistcontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Services Request List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Services</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
    <div class="container">
			<div class="row row-centered">
			                         <div class="col-xs-8 col-centered col-min" style="position: absolute;">
										<div modal="showModal" close="cancel()" class="modal-content" style="background-color: white;">
									<!--<form  id="serviceedit" name="serviceedit" ng-submit="serviceeditsubmit()" novalidate >-->
									<form  id="serviceedit" name="serviceedit"  novalidate >
											<div class="modal-header">
											<h4>Notify Service Request</h4>
											</div>
											<div class="modal-body">
												
												 <div class="form-group has-feedback" ng-class="{ 'has-error' : serviceedit.title_edit.$invalid && !serviceedit.title_edit.$pristine }">
													<textarea class="form-control" id="service_response_detais" name="service_response_detais" ng-model="service_response_detais" required ></textarea>
													<p ng-show="serviceedit.service_response_detais.$invalid && !serviceedit.service_response_detais.$pristine" class="help-block">Field is required.</p>
													
												  </div>
												  <div  class="form-group"  ng-class="{ 'has-error' : adduser.status.$invalid && !adduser.status.$pristine }">
											  
														<label for="sel1">Status:</label>
														
													 <select class="form-control"  id="status" name="status"  required ng-model="status"
														ng-options="opt.id as opt.label for opt in statuslist">
													</select>
													
												    <p ng-show="adduser.status.$invalid && !adduser.status.$pristine" class="help-block">Field is required.</p>
											     </div>
												  
												  <input type="hidden" class="form-control"  id="user_id" name="user_id" ng-model="user_id" > 
												  <input type="hidden" class="form-control"  id="request_id" name="request_id" ng-model="request_id" >
												   <input type="hidden" class="form-control"  id="device_token" name="device_token" ng-model="device_token" >
													
												 
												
											</div>
											<div class="modal-footer">
											  <button class="btn btn-success" ng-disabled="serviceedit.$invalid" ng-click="serviceeditsubmit()">Sent Notification</button>
											  <button class="btn" ng-click="cancel()">Cancel</button>
											</div>
										</form>
										</div>
									</div>
									
									 <div class="col-xs-12 col-centered col-min" style="width:85%";>
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											   <div class="col-sm-2">Name</div>
											   <div class="col-sm-1">User Type</div>
											   <div class="col-sm-2">Phone no</div>
											   <div class="col-sm-1">Service</div>
											  <div class="col-sm-2">Service Details</div>
											  <div class="col-sm-1">status</div>
											  <div class="col-sm-1">Create at</div>
												<div class="col-sm-2">Action</div>
										         
										</div>
										
										<div class="row " ng-repeat="item in services_request_list " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
										  <div class="col-sm-2">{{item.firstname}} {{item.lastname}}</div>
										   <div ng-if="item.user_type==13" class="col-sm-1">Owner</div>
										    <div ng-if="item.user_type==14" class="col-sm-1">Tenant</div> <div ng-if="item.user_type==15" class="col-sm-1">Visitor</div>
											 <div ng-if="item.user_type==16" class="col-sm-1">Security Person</div>
										   <div class="col-sm-2">{{item.phone1}}</div>
										   <div class="col-sm-1">{{item.name}}</div>
										    <div class="col-sm-2">{{item.details}}</div>
											 <div class="col-sm-1">{{item.status}}</div>
											  <div class="col-sm-1">{{item.created_at}}</div>
										   <div class="col-sm-2">
											
											<button class="btn btn-primary"  ng-click="delete(item.id)">Delete</button>|
											<button class="btn btn-primary" ng-click="edit(item.id,item.user_id,item.device_token)">Notify</button></div>
											</div>
										     <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;" ng-show="!services_request_list.length">No Result Found!</div>    
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
	 $scope.statuslist=[
	 {
		 id: 0,
         label: "Pending"
	  },
	 {
		 id: 1,
         label: "Process"
	 },
	 {
		 id: 2,
         label: "Accepted"
	 }
	 ]
	 $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/services/get_services_request_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.services_request_list=data;
	 });
	  /* $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/services/get_services_type',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.servicestypelist=data;
			 
			
		}); */
	
	          $scope.edit = function (id,user_id,device_token) {
				  $scope.showModal = true;
				  //console.log(name);
				   $scope.user_id =user_id;
					$scope.request_id = id;
					$scope.device_token = device_token;
					$scope.service_response_detais='';
					
			  }
			  $scope.cancel = function() {
				  $scope.showModal = false;
				}; 

				
	$scope.serviceeditsubmit=function()
	{
		//alert($scope.status);
		 $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/services/service_notify_user',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({service_response_detais:$scope.service_response_detais,user_id:$scope.user_id,request_id:$scope.request_id,device_token:$scope.device_token
				,status:$scope.status})
			}).success(function(data) {
				 console.log(data);
				 if(data.multicast_id>0)
 				 {
					 window.location.href="<?php echo base_url();?>index.php/services/services_request_list";
				 }
				 
			}); 
	}		
				
  $scope.delete = function (str) 
       {
		  // alert(str);
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/services/services_request_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/services/services_request_list";
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