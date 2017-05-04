<div class="content-wrapper" ng-controller="userlist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Property List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Property</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											   <div class="col-sm-1">Name</div>
											   <div class="col-sm-1">Address</div>
											   <div class="col-sm-1">Country</div>
											   <div class="col-sm-1">State</div>
											    <div class="col-sm-2">City</div>
												<div class="col-sm-2">Zip</div>
												<div class="col-sm-1">Type</div>
												<div class="col-sm-3">Action</div>
										         
										</div>
										
										<div class="row " ng-repeat="item in propertylist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
										  <div class="col-sm-1">{{item.property_name}}</div>
										   <div class="col-sm-1">{{item.property_address}}</div>
										   <div class="col-sm-1">{{item.country_name}}</div>
										   <div class="col-sm-1">{{item.state_name}}</div>
										   <div class="col-sm-2">{{item.city_name}}</div>
										   <div class="col-sm-2">{{item.zip}}</div>
										  <div class="col-sm-1">{{item.property_type_name}}</div>
											 
											<div class="col-sm-3">
											<a class="btn btn-primary" href="<?php echo base_url();?>index.php/property/view_property_details/{{item.id}}">View</a>|
											<button class="btn btn-primary"  ng-click="delete(item.id)">Delete</button>|
											<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/property/edit_property_details/{{item.id}}">Edit</a>
											</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;" ng-show="!propertylist.length">No Result Found!</div>
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
	  url:'<?php echo base_url();?>index.php/property/get_property_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.propertylist=data;
	 });

  $scope.delete = function (str) 
       {
		  // alert(str);
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/property/property_list_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/property";
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