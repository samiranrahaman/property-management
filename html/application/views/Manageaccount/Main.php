<div class="content-wrapper" ng-init='init()' ng-controller="accountmennage">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>ManageAccount</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">ManageAccount</li>
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
					
					
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.due_date.$invalid && !addaccount.due_date.$pristine }">
						<label for="sel1">Date Due/Owed:</label>
						<input type="date" class="form-control" placeholder="Due/Owed:" id="due_date" name="due_date" ng-model="due_date" required> 
						<p ng-show="addaccount.due_date.$invalid && !addaccount.due_date.$pristine" class="help-block"> Due/Owed Date is required.</p>
						
					</div>
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
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.amount_due.$invalid && !addaccount.amount_due.$pristine }">
						<label for="sel1">Amount Due/Owed:</label>
						<input type="number" class="form-control" placeholder="" id="amount_due" name="amount_due" ng-model="amount_due"  required> 
						<p ng-show="addaccount.amount_due.$invalid && !addaccount.amount_due.$pristine" class="help-block">This Field is required.</p>
						
					</div>
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.amount_paid.$invalid && !addaccount.amount_paid.$pristine }">
						<label for="sel1">Amount Paid:</label>
						<input type="number" class="form-control" placeholder="" id="amount_paid" name="amount_paid" ng-model="amount_paid"  required> 
						<p ng-show="addaccount.amount_paid.$invalid && !addaccount.amount_paid.$pristine" class="help-block">This Field is required.</p>
						
					</div>
					<div class="form-group has-feedback" ng-class="{ 'has-error' : addaccount.amount_remain.$invalid && !addaccount.amount_remain.$pristine }">
						<label for="sel1">Amount Remaning:</label>
						<input type="number" class="form-control" placeholder="" id="amount_remain" name="amount_remain" ng-model="amount_remain"  required> 
						<p ng-show="addaccount.amount_remain.$invalid && !addaccount.amount_remain.$pristine" class="help-block">This Field is required.</p>
						
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
					
					<div class="form-group"  ng-class="{ 'has-error' : addaccount.tenant_user.$invalid && !addaccount.tenant_user.$pristine }">
					  
								<label for="sel1">Tenant:</label>
								
							 <select class="form-control" id="tenant_user" name="tenant_user"  required ng-model="tenant_user"
								ng-options="opt.id as opt.tenant for opt in userlist">
							</select>
							
						<p ng-show="addaccount.tenant_user.$invalid && !addaccount.tenant_user.$pristine" class="help-block">Field is required.</p>
					</div>
					
					<div class="form-group">
					  
								<label for="sel1">Property:</label>
								
							 <select class="form-control" id="property" name="property"   ng-model="property"
								ng-options="opt.id as opt.name for opt in propertylist">
							</select>
							
						<!--<p ng-show="addaccount.property.$invalid && !addaccount.property.$pristine" class="help-block">Field is required.</p>-->
					</div>
					
					  <div class="form-group" style="margin-top: 19px;">
						<div class="col-xs-4 pull-right">
								<button type="submit" class="btn btn-primary" ng-disabled="addaccount.$invalid">Create </button>
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
			name:'Cheque'
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
		 
		 $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/user/get_user_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 }).success(function(data){
				 console.log(data);
				 $scope.userlist=data;
			 });
			 
		 $http({
		  method:"post",
		  url:'<?php echo base_url();?>index.php/property/get_property_list',
		  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 }).success(function(data){
				 console.log(data);
				 $scope.propertylist=data;
			 });
			
	}
	 
		 
		 
	  $scope.accountform=function()
	 {
		 
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/manageaccount/post_manageaccount_data',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({due_date:$scope.due_date,paid_date:$scope.paid_date,description:$scope.description,
								amount_due:$scope.amount_due,amount_paid:$scope.amount_paid,
								amount_remain:$scope.amount_remain,
								payment_category:$scope.payment_category,
								tenant_user:$scope.tenant_user,
								property:$scope.property,
								payment_type:$scope.payment_type})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					 window.location.href="<?php echo base_url();?>index.php/manageaccount/payment_list";
				 } 
		 })
	 }
	 
 });
 
 </script>