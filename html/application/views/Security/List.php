<div class="content-wrapper" ng-controller="userlist">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Global Notification List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Notification</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											  <div class="col-sm-4">Subject</div>
											  
											  <div class="col-sm-4">Message</div>
											   <div class="col-sm-4">Action</div>
										         
										</div>
										<div class="row " ng-repeat="item in global_notification_list " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">{{item.	title}} </div>
											  <div class="col-sm-4">{{item.message}}</div>
											  
											  <div class="col-sm-4">
												
												
												<button class="btn btn-primary">Delete</button>|
												<a class="btn btn-primary"  href="#">Edit</a>
												</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!global_notification_list.length">No Result Found!</div>
										
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
	  url:'<?php echo base_url();?>index.php/security/global_notification_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.global_notification_list=data;
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
	 
 });
 </script>