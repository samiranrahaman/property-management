<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Property Details</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Propertydetails</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        <?php 
		/*  echo"<pre>";
       print_r($data);  */
		?>
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			        <div class="row" style="border: 1px solid #fff;">
						  <div class="col-sm-4"><b>Property Name</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->property_name;?>
						  </div>
						  
						  <div class="col-sm-4"><b>Property Address</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->property_address;?>
						  </div>
						  
						  <div class="col-sm-4"><b>Zip</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->zip;?>
						  </div>
						  
						  <div class="col-sm-4"><b>Country</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->country_name;?>
						  </div>
						   <div class="col-sm-4"><b>City</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->city_name;?>
						  </div>
						   <div class="col-sm-4"><b>State</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->state_name;?>
						  </div>
						   <div class="col-sm-4"><b>Property Type</b></div>
						  <div class="col-sm-8"><?php echo $data[0]->property_type_name;?>
						  </div>
						   
                    </div>					   
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 