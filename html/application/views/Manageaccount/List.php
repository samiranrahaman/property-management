<div class="content-wrapper" ng-controller="accountmanagement">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Payment List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Payment</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
       <a href="<?php echo base_url();?>index.php/manageaccount"><h4>Add New Payment</h4></a> 
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width:95%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											   <div class="col-sm-2">Date</div>
											   
											   <div class="col-sm-2">Details</div>
											   <div class="col-sm-2">Amount</div>
												<div class="col-sm-1">Payment</div>
												<div class="col-sm-1">Tenant</div>
												<div class="col-sm-1">Property</div>
												<div class="col-sm-1">created at</div>
												<div class="col-sm-2">Action</div>
										         
										</div>
										
										<div class="row " ng-repeat="item in paymentlist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
										  <div class="col-sm-2"><b>Due Date:</b>{{item.due_date}}
										  </br><b>Paid Date:</b>{{item.paid_date}}</div>
										
										   <div class="col-sm-2">{{item.description}}</div>
										   <div class="col-sm-2">
										   <b>Due:</b>{{item.amount_due}} </br>
										   <b> Paid:</b>{{item.amount_paid}}</br>
										    <b> Remaning:</b>{{item.amount_remain}}
										   </div>
										  
										  <div class="col-sm-1">
										  <b> Type:</b>{{item.payment_type}}</br>
										  <b> Category:</b>{{item.payment_category}}
										  </div>
										  
											<div class="col-sm-1">{{item.tenant_user}}</div>
											<div class="col-sm-1">{{item.property}}</div>
											<div class="col-sm-1">{{item.created_at}}</div>
											<div class="col-sm-2">
											<!--<a class="btn btn-primary" href="<?php echo base_url();?>property/view_property_details/{{item.id}}">View</a>|-->
											<button class="btn btn-primary"  ng-click="delete(item.id)">Delete</button>|
											<a class="btn btn-primary"  href="<?php echo base_url();?>index.php/manageaccount/edit_account/{{item.id}}">Edit</a>
											</div>
										         
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;" ng-show="!paymentlist.length">No Result Found!</div>
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
 var app = angular.module("myApp",[]);
 app.controller("accountmanagement",function($scope,$http,$window){
	 $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/manageaccount/get_payment_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	 }).success(function(data){
		 console.log(data);
		 $scope.paymentlist=data;
	 });

  $scope.delete = function (str) 
       {
		
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/manageaccount/payment_list_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/manageaccount/payment_list";
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