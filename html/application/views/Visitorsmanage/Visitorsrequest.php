 <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<!--<link href="<?php echo base_url();?>datapicker/datepicket-boostrap.css" rel="stylesheet">-->
	
 <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	 
	 <div class="content-wrapper" ng-controller="addusercontroller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Visitors Request</strong>
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
			   <div class="col-xs-6 col-centered col-min">
			   
	           <form  id="adduser" name="adduser" ng-submit="adduserform()" novalidate >
                <div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.firstname.$invalid && !adduser.firstname.$pristine }">
					<label for="sel1">First Name:</label>
					<input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname" ng-model="firstname" required> 
					<p ng-show="adduser.firstname.$invalid && !adduser.firstname.$pristine" class="help-block">First Name is required.</p>
					
				</div>
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.lastname.$invalid && !adduser.lastname.$pristine }">
					<label for="sel1">Last Name:</label>
					<input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname" ng-model="lastname" required> 
					<p ng-show="adduser.lastname.$invalid && !adduser.lastname.$pristine" class="help-block">Last Name is required.</p>
					
				</div>
				
				<div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.phone1.$invalid && !adduser.phone1.$pristine }">
					<label for="sel1">Phone:</label>
					<input type="number" class="form-control" placeholder="" id="phone1" name="phone1" ng-model="phone1"  required> 
					<p ng-show="adduser.phone1.$invalid && !adduser.phone1.$pristine" class="help-block">Phone Number is required.</p>
					
				</div>
				 <div class="form-group has-feedback" ng-class="{ 'has-error' : adduser.perpuse.$invalid && !adduser.perpuse.$pristine }">
				 <label for="sel1">Perpuse:</label>
					<textarea class="form-control" id="perpuse" name="perpuse" ng-model="perpuse" required ></textarea>
					<p ng-show="adduser.perpuse.$invalid && !adduser.perpuse.$pristine" class="help-block">Field is required.</p>
				 </div>
				
				<div class="form-group has-feedback" >
				  <label for="sel1">Date:</label>
					
					  <div id="datetimepicker4" class="input-append">
						<input data-format="yyyy-MM-dd hh:mm:ss" type="text" id="datetime" name="datetime" ng-model="datetime" ></input>
						<span class="add-on">
						  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
						  </i>
						</span>
					  </div>
					
				</div>
				
			
				<div class="form-group"  ng-class="{ 'has-error' : adduser.user_id.$invalid && !adduser.user_id.$pristine }">
				  
							<label for="sel1">User List:</label>
							
						 <select class="form-control"  id="user_id" name="user_id"  required ng-model="user_id"
							ng-options="opt.id as opt.tenant for opt in userlist">
						</select>
						
					<p ng-show="adduser.user_id.$invalid && !adduser.user_id.$pristine" class="help-block">User is required.</p>
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
  
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    
 <script>
 var app = angular.module("myApp",[]);
 app.controller('addusercontroller', function($scope,$http){
	 
   $http({
	  method:"post",
	  url:'<?php echo base_url();?>index.php/user/get_user_list',
	  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			 }).success(function(data){
				 console.log(data);
				 $scope.userlist=data;
			 });

	 
			
	 $scope.adduserform=function()
	 {
		var dtm=$("#datetime").val();
		 console.log($scope.perpuse);
		 $http({
		 method:"post",
		 url:'<?php echo base_url();?>index.php/Visitorsmanage/post_visitor_request',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({firstname:$scope.firstname,
								lastname:$scope.lastname,
								phone1:$scope.phone1,
								user_id:$scope.user_id,
								perpuse:$scope.perpuse,
								datetime:dtm
								})
		 }).success(function(data){
			 console.log(data);
			 if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/visitorsmanage/visitors_request";
				 }
		 })
	 }
	 
	
 })
 </script>
 <script type="text/javascript">
				  $(function() {
					$('#datetimepicker4').datetimepicker({
					  pickTime: true
					});
				  });
				</script>