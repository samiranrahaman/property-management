<div class="content-wrapper" ng-init='init()' ng-controller="accountmennage">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Manage Funds</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">ManageFunds</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
       <!--<a href="<?php echo base_url();?>manageaccount/payment_list"><h4>Payment List</h4></a> -->
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">
				<form  id="addaccount" name="addaccount" ng-submit="accountform()" novalidate >
					
					
					
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.paid_date.$invalid && !addaccount.paid_date.$pristine }">
						<label for="sel1">Date Paid:</label>
						<input type="date" class="form-control" placeholder="Paid Date" id="paid_date" name="paid_date" ng-model="paid_date" required> 
						<p ng-show="addaccount.paid_date.$invalid && !addaccount.paid_date.$pristine" class="help-block">Paid Date is required.</p>
						
					</div>
					
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.description.$invalid && !addaccount.description.$pristine }">
						<label for="sel1">Description:</label>
						<input type="text" class="form-control" placeholder="Description" id="description" name="description" ng-model="description" required> 
						<p ng-show="addaccount.description.$invalid && !addaccount.description.$pristine" class="help-block">Description is required.</p>
						
					</div>
					
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.amount_paid.$invalid && !addaccount.amount_paid.$pristine }">
						<label for="sel1">Amount Paid:</label>
						<input type="number" class="form-control" placeholder="" id="amount_paid" name="amount_paid" ng-model="amount_paid"  required> 
						<p ng-show="addaccount.amount_paid.$invalid && !addaccount.amount_paid.$pristine" class="help-block">This Field is required.</p>
						
					</div>
					
					<div class="form-group"  ng-class="{ 'has-error' : addaccount.payment_type.$invalid && !addaccount.payment_type.$pristine }">
					  
								<label for="sel1">Type of Payment:</label>
								
							 <select class="form-control" id="payment_type" name="payment_type"  required ng-model="payment_type"
								ng-options="opt.id as opt.name for opt in payment_type_list">
							</select>
							
						<p ng-show="addaccount.payment_type.$invalid && !addaccount.payment_type.$pristine" class="help-block">Field is required.</p>
					</div>
					
					<div class="form-group"  ng-class="{ 'has-error' : addaccount.payment_category.$invalid && !addaccount.payment_category.$pristine }">
					  
								<label for="sel1">Category:</label>
								
							 <select class="form-control" id="payment_category" name="payment_category"  required ng-model="payment_category"
								ng-options="opt.id as opt.service_name for opt in serviceslist">
							</select>
							
						<p ng-show="addaccount.payment_category.$invalid && !addaccount.payment_category.$pristine" class="help-block">Field is required.</p>
					</div>
					
					
					
					
					  <div class="form-group" style="margin-top: 19px;">
						<div class="col-xs-4 pull-right">
								<button type="submit" class="btn btn-primary" ng-disabled="addaccount.$invalid">Create Fund Detais </button>
					   </div>
					  </div>
				</form>	
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 <script>
 var app=angular.module("myApp",[]);
 app.controller('accountmennage',function($scope,$http){
	 $scope.init=function()
	 {
		 $scope.payment_type_list=[{
			id:'1' ,
			name:'Check'
		 },
		 {
			id:'2' ,
			name:'Cash' 
		 }];
		 
		 $http({
		  method:"post",
		  url:'<?php echo base_url();?>index.php/services/get_services_list',
		  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 }).success(function(data){
				 console.log(data);
				 $scope.serviceslist=data;
			 });
		 
		
			
	}
	 
		 
		 
	  $scope.accountform=function()
	 {
		 
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/manageaccount/post_managefund_data',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({paid_date:$scope.paid_date,description:$scope.description,
								amount_paid:$scope.amount_paid,
								payment_category:$scope.payment_category,
								payment_type:$scope.payment_type})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
		// window.location.href="<?php echo base_url();?>index.php/manageaccount/payment_list";
				 } 
		 })
	 }
	 
 });
 
 </script>