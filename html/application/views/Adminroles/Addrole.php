<script src="<?php echo base_url();?>js/checklist-model.js"></script>
<div class="content-wrapper" class="content-wrapper" ng-controller="addtypecontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Add New Role</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Administrators</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">	
					<form  id="addtype" name="addtype" ng-submit="addtypesubmit()" novalidate >
				   
					  <div class="form-group has-feedback" ng-class="{ 'has-error' : addtype.title.$invalid && !addtype.title.$pristine }">
						<label for="sel1">Role name:</label>
						<input type="text" class="form-control" placeholder="Role Name" id="title" name="title" ng-model="title" required> 
						<p ng-show="addtype.title.$invalid && !addtype.title.$pristine" class="help-block">Role name is required.</p>
						
					  </div>
					  <div class="form-group has-feedback" ng-repeat="role in roles">
					  <label >
						  <input type="checkbox" checklist-model="user.roles" checklist-value="role"> {{role}}
                      </label>
					  </div>
				   
					  
					  
					  <div class="form-group">
						<div class="col-xs-4 pull-right">
								<button type="submit" class="btn btn-primary" ng-disabled="addtype.$invalid">Create</button>
								|
								<a class="btn btn-primary" href="<?php echo base_url();?>index.php/user/user_type_list">Back</a>
					   </div>
					  </div>
					 
					  
					</form>	
			         <button ng-click="checkAll()" style="margin-right: 10px">Check all</button>
					  <button ng-click="uncheckAll()" style="margin-right: 10px">UnCheck all</button>
			   
			   </div>
			   
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
var app = angular.module("myApp", ["checklist-model"]);
app.controller("addtypecontroller", function($scope,$http,$timeout,$window) {
$scope.roles=['ManageAccount','ManageUser','ManageCountry','ManageProperty','ManageServices','ManageRole','ManageUsertype','ManageSubAdmin'];
  $scope.user = {
    roles: ['ManageUser']
  }; 
  $scope.checkAll = function() {
    $scope.user.roles = angular.copy($scope.roles);
  };
  $scope.uncheckAll = function() {
    $scope.user.roles = [];
  };
  /* $scope.checkFirst = function() {
    $scope.user.roles.splice(0, $scope.user.roles.length); 
    $scope.user.roles.push('guest');
  }; */
 
 $scope.addtypesubmit=function()
{
	
	console.log($scope.user.roles);
	 //alert($scope.productSelected.label);
		 $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/adminroles/post_role',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data :JSON.stringify({title:$scope.title,
			resource_list:$scope.user.roles})
			}).success(function(data) {
				 console.log(data);
				if(data>0)
 				 {
					   window.location.href="<?php echo base_url();?>index.php/adminroles";
				 }
               
				 
				
			}); 
} 
 
			
			
  
});
</script>