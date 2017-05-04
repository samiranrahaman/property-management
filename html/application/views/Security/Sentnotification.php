<div class="content-wrapper" ng-controller="addusercontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Global Notifiation</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Security</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">
			   
	           <form  id="adduser" name="adduser" ng-submit="adduserform()" novalidate >
                <div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.subject.$invalid && !adduser.subject.$pristine }">
					<label for="sel1">Subject:</label>
					<input type="text" class="form-control" placeholder="Subject" id="subject" name="subject" ng-model="subject" required> 
					<p ng-show="adduser.subject.$invalid && !adduser.subject.$pristine" class="help-block">First Name is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.message.$invalid && !adduser.message.$pristine }">
					<label for="sel1">Message:</label>
					<textarea class="form-control" id="message" name="message" ng-model="message"> </textarea>
					<p ng-show="adduser.message.$invalid && !adduser.message.$pristine" class="help-block">Message is required.</p>
					
				</div>
				
				
				  <div class="form-group" style="margin-top: 19px;">
					<div class="col-xs-4 pull-right">
							<button type="submit" class="btn btn-primary" ng-disabled="adduser.$invalid">Create Visitors</button>
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
 app.controller('addusercontroller', function($scope,$http){
	 
  	
	 $scope.adduserform=function()
	 {
		 
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/security/post_global_notification',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({subject:$scope.subject,message:$scope.message})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/security";
				 }
		 })
	 }
	 
	
 })
 </script>