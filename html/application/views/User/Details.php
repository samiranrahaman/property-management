<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>User Details</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Userdetails</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        <?php 
		/* echo"<pre>";
       print_r($data); */
		?>
	<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-12 col-centered col-min" style="width: 84%;">
			        <div class="row" style="border: 1px solid #fff;">
					      <div class="col-sm-4 ml-1">Name</div><div class="col-sm-8 ml-1"><?php echo $data[0]->firstname;?>  <?php echo $data[0]->lastname;?></div>
						   <div class="col-sm-4">Email</div><div class="col-sm-8"><?php echo $data[0]->email;?></div>
						   <div class="col-sm-4">Phone Number</div><div class="col-sm-8"><?php echo $data[0]->phone1;?></div>
						   <div class="col-sm-4">Created at </div><div class="col-sm-8"><?php echo $data[0]->created_at;?></div>
						   <div class="col-sm-4">User type </div><div class="col-sm-8"><?php echo $data[0]->usertype;?></div>
						   <div class="col-sm-4">Property Name</div><div class="col-sm-8"><?php echo $data[0]->property_name;?></div>
						   <div class="col-sm-4">Property Address</div><div class="col-sm-8"><?php echo $data[0]->property_address;?></div>
						   <div class="col-sm-4">Country</div><div class="col-sm-8"><?php echo $data[0]->country_name;?>
						   </div>
						   <div class="col-sm-4">City</div><div class="col-sm-8"><?php echo $data[0]->city_name;?>
						   </div>
						   <div class="col-sm-4">State</div><div class="col-sm-8"><?php echo $data[0]->state_name;?>
						   </div>
                    </div>					   
			   </div>
			</div>
    </div>
	
    </section>
    <!-- /.content -->
  </div>
 