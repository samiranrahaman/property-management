<div class="content-wrapper" ng-controller="addpropertycontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Add Property</strong>
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
			   <div class="col-xs-6 col-centered col-min">
			   
	           <form  id="addproperty" name="addproperty" ng-submit="addpropertyform()" novalidate >
                 
				<div class="form-group has-feedback" ng-class="{ 'has-error' : addproperty.property_name.$invalid && !addproperty.property_name.$pristine }">
					<label for="sel1">Name:</label>
					<input type="text" class="form-control" placeholder="Property Name" id="property_name" name="property_name" ng-model="property_name" required> 
					<p ng-show="addproperty.property_name.$invalid && !addproperty.property_name.$pristine" class="help-block">Name is required.</p>
					
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.property_type.$invalid && !addproperty.property_type.$pristine }">
				  
							<label for="sel1">Building:</label>
							
						 <select class="form-control"  id="property_type" name="property_type"  required ng-model="property_type"
							ng-options="opt.id as opt.title for opt in propertylist">
						</select>
						
					<p ng-show="addproperty.property_type.$invalid && !addproperty.property_type.$pristine" class="help-block">Property Type is required.</p>
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.property_type.$invalid && !addproperty.property_type.$pristine }">
				  
							<label for="sel1">Floor:</label>
							
						 <select class="form-control"  id="property_type" name="property_type"  required ng-model="property_type"
							ng-options="opt.id as opt.title for opt in propertylist">
						</select>
						
					<p ng-show="addproperty.property_type.$invalid && !addproperty.property_type.$pristine" class="help-block">Property Type is required.</p>
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.property_type.$invalid && !addproperty.property_type.$pristine }">
				  
							<label for="sel1">Room/Flat No:</label>
							
						 <select class="form-control"  id="property_type" name="property_type"  required ng-model="property_type"
							ng-options="opt.id as opt.title for opt in propertylist">
						</select>
						
					<p ng-show="addproperty.property_type.$invalid && !addproperty.property_type.$pristine" class="help-block">Property Type is required.</p>
				</div>
				  
				<div class="form-group has-feedback" ng-class="{ 'has-error' : addproperty.address.$invalid && !addproperty.address.$pristine }">
					<label for="sel1">Address:</label>
					<input type="text" class="form-control" placeholder="" id="address" name="address" ng-model="address" required> 
					<p ng-show="addproperty.address.$invalid && !addproperty.address.$pristine" class="help-block">Property Address required.</p>
					
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.country.$invalid && !addproperty.country.$pristine }">
				  
							<label for="sel1">Country:</label>
							
						 <select class="form-control"  id="country" name="country"  required ng-model="country"
							ng-options="opt.id as opt.name for opt in countrylists"
							ng-change='selectcountry()' >
						</select>
						
					<p ng-show="addproperty.country.$invalid && !addproperty.country.$pristine" class="help-block">Country is required.</p>
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.state.$invalid && !addproperty.state.$pristine }">
				  
							<label for="sel1">State:</label>
							
						 <select class="form-control"  id="state" name="state"  required ng-model="state"
							ng-options="opt.id as opt.name for opt in statelists"
							ng-change='selectcity()' >
						</select>
						
					<p ng-show="addproperty.state.$invalid && !addproperty.state.$pristine" class="help-block">State is required.</p>
				</div>
				
				<div class="form-group"  ng-class="{ 'has-error' : addproperty.city.$invalid && !addproperty.city.$pristine }">
				  
							<label for="sel1">City:</label>
							
						 <select class="form-control"  id="city" name="city"  required ng-model="city"
							ng-options="opt.id as opt.name for opt in citylists"
							>
						</select>
						
					<p ng-show="addproperty.city.$invalid && !addproperty.city.$pristine" class="help-block">City is required.</p>
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : addproperty.zip.$invalid && !addproperty.zip.$pristine }">
					<label for="sel1">Postalcode/Zip:</label>
					<input type="text" class="form-control" placeholder="" id="zip" name="zip" ng-model="zip" required> 
					<p ng-show="addproperty.zip.$invalid && !addproperty.zip.$pristine" class="help-block">Postalcode/Zip required.</p>
					
				</div>
				
				  <div class="form-group">
					<div class="col-xs-4 pull-right">
							<button type="submit" class="btn btn-primary" ng-disabled="addproperty.$invalid">Create</button>
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
 var app = angular.module("myApp",[]);
 app.controller('addpropertycontroller', function($scope,$http){
  $http({
			method : 'get',
			url : '<?php echo base_url();?>index.php/property/get_property_type',
	
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data) {
				// alert(data.status);
			 console.log(data);

			 $scope.propertylist=data;
			 
			
		});
	$http({
		 method:'post',
		 url:'<?php echo base_url();?>index.php/managecountry/get_allow_country',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	     }).success(function(data){
		 console.log(data);
		 $scope.countrylists=data
		 
		 });
	$scope.selectcountry=function()
	{
		
		//alert($scope.country);
		$http({
		 method:'post',
		 url:'<?php echo base_url();?>index.php/managecountry/get_allow_state',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({country_id:$scope.country})
	     }).success(function(data){
		 console.log(data);
		 $scope.statelists=data
		 });
		 
	}	
	$scope.selectcity=function()
	{
		
		//alert($scope.state);
		if($scope.state>0)
		{
			$http({
			 method:'post',
			 url:'<?php echo base_url();?>index.php/managecountry/get_allow_city',
			 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			 data :JSON.stringify({state_id:$scope.state})
			 }).success(function(data){
			 console.log(data);
			 $scope.citylists=data
			 });
		}
		else
		{
				$scope.citylists=[
							{
							id: "",
							name: "",
							}
							];
		}
		
		 
	}	
	
	 $scope.addpropertyform=function()
	 {
		 //alert($scope.property_name);
		 
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/property/post_property_data',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({property_name:$scope.property_name,property_type:$scope.property_type,address:$scope.address,
		 country:$scope.country,
		 state:$scope.state,
		 city:$scope.city,
		 zip:$scope.zip,})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/property";
				 }
		 })
	 }
 })
 </script>