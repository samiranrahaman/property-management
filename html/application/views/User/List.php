<div class="content-wrapper" ng-controller="userlist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>User List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Userlist</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											  <div class="col-sm-2">Name</div>
											  
											   <div class="col-sm-1">User Type</div>
											    <div class="col-sm-1">Property</div>
											   <div class="col-sm-2">Phone</div>
											    <div class="col-sm-2">Email</div>
												<div class="col-sm-1">Status</div>
												<div class="col-sm-3">Action</div>
										         
										</div>
										<div class="row " ng-repeat="item in userlist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-2">{{item.firstname}} {{item.lastname}}</div>
											  <div class="col-sm-1">{{item.user_type}}</div>
											   <div class="col-sm-1">{{item.name}}</div>
											  <div class="col-sm-2">{{item.phone1}}</div>
											  <div class="col-sm-2">{{item.email}}</div>
											   <div ng-if="item.status==0" class="col-sm-1">
											   <input type="checkbox" ng-model="active" ng-click="checked(item.id,item.device_token)">
											   </div>
											   
											    <div ng-if="item.status==1" class="col-sm-1">
											   <input type="checkbox" ng-model="active" ng-click="checked(item.id,item.device_token)" ng-checked="true">
											   </div>
											   
												<div class="col-sm-3">
												
												<a class="btn btn-primary" href="<?php echo base_url();?>index.php/user/get_user_details/{{item.id}}">View</a>|
												<button class="btn btn-primary"  ng-click="delete(item.id)">Delete</button>|
												<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/user/edit_user_details/{{item.id}}">Edit</a>
												</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!userlist.length">No Result Found!</div>
										
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
	  url:'<?php echo base_url();?>index.php/user/get_user_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.userlist=data;
	 });
	 
	$scope.checked=function(id,device_token)
	{
		//alert(id);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/user/user_status',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:id,device_token:device_token})
			}).success(function(data) {
				 console.log(data);
				 
				
			});
	}		
$scope.delete = function (str) 
       {
		  // alert(str);
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/user/user_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/user";
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