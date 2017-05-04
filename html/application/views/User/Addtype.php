<div class="content-wrapper" class="content-wrapper" ng-controller="addtypecontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Add New User Type</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Usertype</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">	
					<form  id="addtype" name="addtype" ng-submit="addtypesubmit()" novalidate >
				   
					  <div class="form-group has-feedback" ng-class="{ 'has-error' : addtype.title.$invalid && !addtype.title.$pristine }">
						<label for="sel1">Type name:</label>
						<input type="text" class="form-control" placeholder="Type Name" id="title" name="title" ng-model="title" required> 
						<p ng-show="addtype.title.$invalid && !addtype.title.$pristine" class="help-block">Type name is required.</p>
						
					  </div>
					  
					  
				   
					  
					  
					  <div class="form-group">
						<div class="col-xs-4 pull-right">
								<button type="submit" class="btn btn-primary" ng-disabled="addtype.$invalid">Create</button>
								|
								<a class="btn btn-primary" href="<?php echo base_url();?>index.php/user/user_type_list">Back</a>
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
var app = angular.module("myApp", []);
app.controller("addtypecontroller", function($scope,$http,$timeout,$window) {

 
$scope.addtypesubmit=function()
{
	
	//alert($scope.title);
	 //alert($scope.productSelected.label);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/user/post_user_type',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({title:$scope.title})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/user/user_type_list";
				 }
				 /* else
				 {
					 $scope.validationError = true;
				 }  */
				
			});
}
 
			
			
  
});
</script>