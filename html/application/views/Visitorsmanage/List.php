<div class="content-wrapper" ng-controller="userlist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Permanent Visitors List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Visitors</li>
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
											  
											   <div class="col-sm-2">Visitor Type</div>
											   <div class="col-sm-2">Phone</div>
											    <div class="col-sm-2">Check IN</div>
											   <div class="col-sm-2">Check Out</div>
											    <div class="col-sm-2">Action</div>
										         
										</div>
										<div class="row " ng-repeat="item in visitorslist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-2">{{item.staff_firstname}} {{item.staff_lastname}}</div>
											  <div class="col-sm-2">{{item.staff_type}}</div>
											  <div class="col-sm-2">{{item.staff_phoneno}}</div>
											  <div  ng-if="item.staff_check_in_time=='0000-00-00 00:00:00'"class="col-sm-2">
											   <input type="checkbox" ng-model="checked_in" ng-click="checkedin(item.staff_id,item.ten_id)" >
											   </div>
											    <div  ng-if="item.staff_check_in_time!='0000-00-00 00:00:00'"class="col-sm-2">
											   <input type="checkbox" ng-model="checked_in" ng-click="checkedin(item.staff_id,item.ten_id)" ng-checked="true">
											   </div>
											    <div ng-if="item.staff_check_out_time=='0000-00-00 00:00:00'" class="col-sm-2">
											   <input type="checkbox" ng-model="checked_out" ng-click="checkedout(item.staff_id,item.ten_id,item.active_statff_id)" >
											   </div>
											   <div ng-if="item.staff_check_out_time!='0000-00-00 00:00:00'" class="col-sm-2">
											   <input type="checkbox" ng-model="checked_out" ng-click="checkedout(item.staff_id,item.ten_id,item.active_statff_id)"ng-checked="true" >
											   </div>
											   
											  <div class="col-sm-2">
												
												
												<button class="btn btn-primary"  ng-click="delete(item.staff_id)">Delete</button>|
												<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/visitorsmanage/edit_visitor_details/{{item.staff_id}}">Edit</a>
												</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!visitorslist.length">No Result Found!</div>
										
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
	  url:'<?php echo base_url();?>index.php/Visitorsmanage/get_visitors_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.visitorslist=data;
	 });
	 		
	$scope.delete = function (str) 
       {
		  // alert(str);
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Visitorsmanage/visitor_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/Visitorsmanage";
				 }
				 
				
			});
	  
      }   
			   
    }
	
	$scope.checkedout=function(id,requested_user_id,active_statff_id)
	{
		//alert(active_statff_id);
		if(active_statff_id>0)
		{
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Visitorsmanage/domestic_staff_check_out_time',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:id,requested_user_id:requested_user_id,active_statff_id:active_statff_id})
			}).success(function(data) {
				 console.log(data);
				 
				
			});
		}
		else
		{
			alert('Not check In')
		}
	} 
   $scope.checkedin=function(id,requested_user_id)
	{
		//alert(id);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Visitorsmanage/domestic_staff_check_in_time',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:id,requested_user_id:requested_user_id})
			}).success(function(data) {
				 console.log(data);
				 
				
			});
	} 
	 
 });
 </script>