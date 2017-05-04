<div class="content-wrapper" ng-controller="accountmanagement">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Funds List</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Funda</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
       <a href="<?php echo base_url();?>index.php/manageaccount/manage_fund"><h4>Add New Fund uses</h4></a> 
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width:95%;">
			                            <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #3c8dbc;">
											
											   <div class="col-sm-2">Date</div>
											   
											   <div class="col-sm-2">Details</div>
											   <div class="col-sm-2">Amount</div>
												<div class="col-sm-2">Payment</div>
												<div class="col-sm-2">created at</div>
												<div class="col-sm-2">Action</div>
										         
										</div>
										
										<div class="row " ng-repeat="item in paymentlist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
										  <div class="col-sm-2"><b>Paid Date:</b>{{item.paid_date}}</div>
										
										   <div class="col-sm-2">{{item.description}}</div>
										   <div class="col-sm-2">
										    Paid:</b>{{item.amount_paid}}</br>
										   </div>
										  
										  <div class="col-sm-2">
										  <b> Type:</b>{{item.payment_type_name}}</br>
										  <b> Category:</b>{{item.purpose}}
										  </div>
										  
											<div class="col-sm-2">{{item.created_at}}</div>
											<div class="col-sm-2">
											<button class="btn btn-primary">Delete</button>|
											<a class="btn btn-primary"  href="#">Edit</a>
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
	  url:'<?php echo base_url();?>index.php/manageaccount/get_fund_list',
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