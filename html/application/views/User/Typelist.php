<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>
<div ng-init='init()' class="content-wrapper" ng-controller="typelist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>List of User Type</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Usertypelist</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
      <a href="<?php echo base_url();?>index.php/user/add_user_type"><h4>Add New</h4></a>  
	<div class="container">
	       <div class="row row-centered">
			   <div class="col-xs-8 col-centered col-min" style="position: absolute;">

			                <div modal="showModal" close="cancel()" class="modal-content" style="background-color: white;">
							      <form  id="addtype" name="addtype" ng-submit="addtypesubmit()" novalidate >
									<div class="modal-header">
										<h4>Edit User Type</h4>
									</div>
									<div class="modal-body">
										
										 <div class="form-group has-feedback" ng-class="{ 'has-error' : addtype.title.$invalid && !addtype.title.$pristine }">
											<input type="text" class="form-control" placeholder="Type Name" id="title" name="title" ng-model="title" required> 
											<p ng-show="addtype.title.$invalid && !addtype.title.$pristine" class="help-block">Type name is required.</p>
											
										  </div>
										  <input type="hidden" class="form-control"  id="type_id" name="type_id" ng-model="type_id" required> 
											
											
										 
										
									</div>
									<div class="modal-footer">
									  <button class="btn btn-success" ng-disabled="addtype.$invalid" ng-click="ok()">Update</button>
									  <button class="btn" ng-click="cancel()">Cancel</button>
									</div>
									</form>
			                </div>
		</div>
		</div>
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" >
			   
			     	                    <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											  <div class="col-sm-4">Title</div>
											   <div class="col-sm-4">Creation Date</div>
												<div class="col-sm-4">Action</div>
										         
										</div>
										<div class="row " ng-repeat="item in usertypelist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">{{item.name}}</div>
											   <div class="col-sm-4">{{item.craeted_at}}</div>
												<div class="col-sm-4">
												<button class="btn btn-primary" ng-click="delete(item.id)">Delete</button>
												|<button class="btn btn-primary" ng-click="edit(item.id,item.name)">Edit</button></div>
										         
										</div>
			   
			   
			   
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("typelist", function($scope,$http,$timeout,$window) {
 
$scope.edit = function (id,name) {
	  $scope.showModal = true;
	   $scope.title =name;
	    $scope.type_id = id;
  }
 /*  $scope.ok = function() {
  $scope.showModal = false;
}; */

$scope.cancel = function() {
  $scope.showModal = false;
}; 
	
 $http({
				method : 'get',
				url : '<?php echo base_url();?>index.php/user/get_user_type',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);

				 $scope.usertypelist =data;
				 
				
			}); 
 
$scope.addtypesubmit=function()
{
	
	  //alert($scope.title);
	 //alert($scope.productSelected.label);
		 $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/user/usertype_update',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({title:$scope.title,type_id:$scope.type_id})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/user/user_type_list";
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
        url : '<?php echo base_url();?>index.php/user/usertype_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/user/user_type_list/";
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