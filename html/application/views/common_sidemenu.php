<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        <div class="pull-left info">
          <?php //echo $user_info->admin_first_name.' '.$user_info->admin_last_name;
		  echo $user_info[0]->admin_first_name.' '.$user_info[0]->admin_last_name;
		  //print_r($user_info);
		  if($user_info[1]['user']=='admin')
		  {
			 
			  $resource_array=array('all');
		  }
		  else
			{
			 $resource_array= json_decode($user_info[1]['resource_id']);
			 
			
			}
			//print_r($resource_array);
		  ?>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
        <br/>
        <br/>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
     
			 <li class="active treeview" >

  			  <a href="#">
  				<i class="fa fa-dashboard"></i> <span>Tenant</span> <i class="fa fa-angle-left pull-right"></i>
  			  </a>
			
  			  <ul class="treeview-menu">
			   
                <li><a href="<?php echo base_url();?>index.php/dashboard"><i class="fa fa-dashboard "></i>Dashboard</a></li>
				
				
				 <li class="active treeview" <?php if(!(in_array('all',$resource_array) || in_array('ManageAccount',$resource_array))){ echo "style='display:none'";}?>>

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Manage Account</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
						    <li><a href="<?php echo base_url();?>index.php/manageaccount"><i class="fa fa-dashboard "></i>Create Payment</a>
							</li>
							<li><a href="<?php echo base_url();?>index.php/manageaccount/payment_list"><i class="fa fa-dashboard "></i>Payment History</a>
							</li>
							<li><a href="<?php echo base_url();?>index.php/manageaccount/manage_fund"><i class="fa fa-dashboard "></i>Create Fund Uses</a>
							</li>
							<li><a href="<?php echo base_url();?>index.php/manageaccount/fund_list"><i class="fa fa-dashboard "></i>Fund History</a>
							</li>
					
					 </ul> 	
				</li>
				
				
				
				
				
				
				 <li class="active treeview" <?php if(!(in_array('all',$resource_array) || in_array('ManageUsertype',$resource_array))){ echo "style='display:none'";}?>>

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Users Type</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li><a href="<?php echo base_url();?>index.php/user/user_type_list"><i class="fa fa-dashboard "></i>Users Type List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/user/add_user_type"><i class="fa fa-dashboard "></i>Add New</a></li>
					
					 </ul> 	
				</li>
				<li <?php if(!(in_array('all',$resource_array) || in_array('ManageCountry',$resource_array))){ echo "style='display:none'";}?>><a href="<?php echo base_url();?>index.php/managecountry"><i class="fa fa-dashboard "></i>Manage Country</a></li>
				
				<li <?php if(!(in_array('all',$resource_array) || in_array('ManageUser',$resource_array))){ echo "style='display:none'";}?> class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Manage Users</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li><a href="<?php echo base_url();?>index.php/user"><i class="fa fa-dashboard "></i>Users List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/user/add_user"><i class="fa fa-dashboard "></i>Add New</a></li>
					
					 </ul> 	
				</li>
				<li <?php if(!(in_array('all',$resource_array) || in_array('ManageProperty',$resource_array))){ echo "style='display:none'";}?> class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Manage Property</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li><a href="<?php echo base_url();?>index.php/property"><i class="fa fa-dashboard "></i>Property List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/property/add_property"><i class="fa fa-dashboard "></i>Add New Property </a></li>
					   <li><a href="<?php echo base_url();?>index.php/property/add_property_type"><i class="fa fa-dashboard "></i>Add building</a></li>
					   <li><a href="<?php echo base_url();?>index.php/property/add_property_type"><i class="fa fa-dashboard "></i>Add Floor</a></li>
					    
					
					 </ul> 	
				</li>
				<li <?php if(!(in_array('all',$resource_array) || in_array('ManageServices',$resource_array))){ echo "style='display:none'";}?> class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Manage Services</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					    <li><a href="<?php echo base_url();?>index.php/services/services_request_list"><i class="fa fa-dashboard "></i>Services Request List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/services"><i class="fa fa-dashboard "></i>Services List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/services/add_services"><i class="fa fa-dashboard "></i>Add New Services </a></li>
					   <li><a href="<?php echo base_url();?>index.php/services/add_services_type"><i class="fa fa-dashboard "></i>Services type</a></li>
					  </ul> 	
				</li>
				 <li <?php if(!(in_array('all',$resource_array) ||  in_array('ManageRole',$resource_array))){ echo "style='display:none'";}?> class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Administrators Roles</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li><a href="<?php echo base_url();?>index.php/adminroles"><i class="fa fa-dashboard "></i>Roles</a></li>
					   <li><a href="<?php echo base_url();?>index.php/adminroles/add_role"><i class="fa fa-dashboard "></i>Add New Role</a></li>
					
					 </ul> 	
				</li>
				<li <?php if(!(in_array('all',$resource_array) || in_array('ManageSubAdmin',$resource_array))){ echo "style='display:none'";}?> class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Administrators Users</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li><a href="<?php echo base_url();?>index.php/adminuser"><i class="fa fa-dashboard "></i>Users List</a></li>
					   <li><a href="<?php echo base_url();?>index.php/adminuser/add_user"><i class="fa fa-dashboard "></i>Add New</a></li>
					
					 </ul> 	
				</li>
				
				<li class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Domestic Helps</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li>
					   <a href="<?php echo base_url();?>index.php/visitorsmanage"><i class="fa fa-dashboard "></i>Domestic Visitors</a>
					   </li>
					   <li>
					   <a href="<?php echo base_url();?>index.php/visitorsmanage/add_user"><i class="fa fa-dashboard "></i>Add New Domestic Visitors</a>
					   </li>
					    <li>
					   <a href="<?php echo base_url();?>index.php/visitorsmanage/visitors_request"><i class="fa fa-dashboard "></i>Visitors Requests List</a>
					   </li>
					    <li>
					   <a href="<?php echo base_url();?>index.php/visitorsmanage/sent_visitor_request"><i class="fa fa-dashboard "></i>Visitors Requests</a>
					   </li>
					
					 </ul> 	
				</li>
				
				<li class="active treeview">

					  <a href="#">
						<i class="fa fa-dashboard"></i> <span>Global Notification</span> <i class="fa fa-angle-left pull-right"></i>
					  </a>
					
					  <ul class="treeview-menu">
					   <li>
					   <a href="<?php echo base_url();?>index.php/security"><i class="fa fa-dashboard "></i>Notification List</a>
					   </li>
					   <li>
					   <a href="<?php echo base_url();?>index.php/security/sent_global_notification"><i class="fa fa-dashboard "></i>Sent Notification</a>
					   </li>
					    
					
					 </ul> 	
				</li>
				
			
			 </ul> 	
			 </li>
		</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
