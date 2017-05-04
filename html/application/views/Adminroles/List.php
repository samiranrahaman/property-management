<div class="content-wrapper" ng-controller="userlist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Administrators Roles</strong>
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
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											  <div class="col-sm-8">Name</div>
											   <div class="col-sm-4">Action</div>
											    
										</div>
										<div class="row " ng-repeat="item in roleslist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											    <div class="col-sm-8">{{item.roll_name}}</div>
											    <div class="col-sm-4">
												<button class="btn btn-primary"  ng-click="delete(item.role_id)">Delete</button>|
												<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/adminroles/edit_roles/{{item.role_id}}">Edit</a>
												</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!roleslist.length">No Result Found!</div>
										
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
 var app = angular.module("myApp",[]);
 app.controller("userlist",function($scope,$http,$window){
	 $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/adminroles/get_roles',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.roleslist=data;
	 });
	 
	/* $scope.checked=function(id,device_token)
	{
		//alert(id);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/adminroles/get_roles',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:id,device_token:device_token})
			}).success(function(data) {
				 console.log(data);
				 
				
			});
	} */		
$scope.delete = function (str) 
       {
		  
		 var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/adminroles/role_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				if(data==1)
 				 {
					   window.location.href="<?php echo base_url();?>index.php/adminroles";
				 }
				 
				
			});
	  
      }   
			   
    }
	 
 });
 </script>