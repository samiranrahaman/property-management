<div class="content-wrapper" ng-init='init()' ng-controller="countrymanage">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Managecountry</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Managecountry</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">
				   <form  id="selectcountry" name="selectcountry" ng-submit="selectcountrysave()" novalidate >
				   <div class="form-group"  ng-class="{ 'has-error' : selectcountry.countryselected.$invalid && !suppliercost.countryselected.$pristine }">
	  
							<label for="sel1">Allow Countries:</label>
							
						 <!--<select multiple class="form-control"  id="countryselected" name="countryselected"  required ng-model="countryselected" style="height: 206px; " ng-options="opt as opt.label for opt in countrylists">
						</select>-->
						<select multiple class="form-control"  id="countryselected" name="countryselected"  required ng-model="countryselected" style="height: 206px; " ng-options="opt.label as opt.label for opt in countrylists">
						</select>
						
						<!--<select name="multipleSelect" id="multipleSelect" ng-options="option.name as option.name for option in options" ng-model="selectedOptionNames" multiple>
                          </select>-->
						
						
					    <p ng-show="suppliercost.countryselected.$invalid && !suppliercost.countryselected.$pristine" class="help-block">Countrie is required.</p>
				  </div>
				    <div class="form-group">
						<div class="col-xs-4 pull-right">
								<button type="submit" class="btn btn-primary" ng-disabled="selectcountry.$invalid">Save</button>
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
 var app = angular.module('myApp',[]);
 app.controller('countrymanage',function($scope,$http){
	 
	 $http({
		 method:'post',
		 url:'<?php echo base_url();?>index.php/managecountry/get_country',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	     }).success(function(data){
		 console.log(data);
		 $scope.countrylists=data
		 console.log(data[0].value);
		 //console.log(data[1].value);
		 //console.log(data[2].value);
		 //$scope.countryselected= [{value:1, label:"Afghanistan"},{value:3, label:"Algeria"}];
		 //$scope.countryselected= ['Afghanistan', 'Algeria'];
		 
	     });
		 
	$http({
		 method:'post',
		 url:'<?php echo base_url();?>index.php/managecountry/get_selected_country',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	     }).success(function(data){
		 console.log(data);
		 $scope.countryselected=data;
		
	     });
	 
	 //var vm = this;
		/*   $scope.options = [{
		id: '1',
		name: 'Option A'
		}, {
		id: '2',
		name: 'Option B'
		}, {
		id: '3',
		name: 'Option C'
		}];
		$scope.selectedOptionNames = ['Option B', 'Option C']; */
	
 $scope.selectcountrysave=function()
 {
	 
	 var l=$scope.countryselected.length;
	 //alert(l);
	 console.log($scope.countryselected);
	 var country_namelist='';
	 for(var i=0;i<l;i++)
	 {
		 
		 //console.log($scope.countryselected[i]);
		  country_namelist+=$scope.countryselected[i];
		  country_namelist+=',';
		
	 }
	  console.log(country_namelist);
	 $http({
		 method:'post',
		 url:'<?php echo base_url();?>index.php/managecountry/allow_country',
		 headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 data :JSON.stringify({countryname:country_namelist})
	     }).success(function(data){
		 console.log(data);
		// $scope.countrylists=data
	    }); 
		
	 /* if(i>0)
	 {
		  window.location.href="<?php echo base_url();?>managecountry";
	 } */
	 
	//console.log($scope.countryselected)
 }	 
	 
	 
 })
 
 </script>