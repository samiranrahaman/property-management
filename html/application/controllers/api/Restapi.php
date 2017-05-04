<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Restapi extends REST_Controller 
{
   public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->model('Login_model');
		$this->load->model('Property_model');
		$this->load->model('Services_model');
		$this->load->model('Manageaccount_model');
		$this->load->model('Visitorsmanage_model');
		$this->load->model('Security_model');
		
		
		
		/* if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} */
	}
	public function users_type_get()
    {
		
		
		$result=$this->User_model->get_user_type();
		if(!empty($result))
        {
            $this->response(array(
                    'status' => TRUE,
                    'message' => 'success',
					'result' => $result,
					
                ), 200); // 200 being the HTTP response code
        }
        else
        {
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'No result found'
                ));
               
        }
		
	}
	
	function user_reg_get()
    {
		        $firstname = $this->get('firstname');
			    $lastname = $this->get('lastname');
			    //$dob = $this->get('dob');
			  $phone1 = $this->get('phone1');
			   $email = $this->get('email');
			   $user_type = $this->get('user_type');
			   $username = $phone1;
			   $password = $this->get('password'); 
			   $device_token = $this->get('device_token'); 
			   //$property_name = $request->property_name;
         $result = $this->User_model->post_add_user_api($firstname,$lastname,$phone1,$email,$user_type,$username,$password,$device_token);
         
        if($result === FALSE)
        {
            $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
        }
        else if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'User Already Exist'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		//http://192.168.1.123:8081/tenant/api/restapi/user_reg?X-API-KEY=123&firstname=test&lastname=test&phone1=11111111&email=samiran@gmail.com&user_type=1&password=123456
         
    }
	 
	 
	public function login_get()
    {
		        $username = $this->get('username');
			    $password = $this->get('password');
				$device_token = $this->get('device_token');
		
		$result=$this->Login_model->verify_login_credintial_api($username,$password,$device_token);
		if(is_array($result))
        {
            $this->response(array(
                    'status' => TRUE,
                    'message' => 'success',
					'result' => $result,
					
                ), 200); // 200 being the HTTP response code
        }
		else if($result==1)
		{
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'Account not Active'
                ));
		}
        else
        {
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'Username/Passwors is Wrong'
                ));
               
        }
		
	} 
	 public function change_password_get()
    {
		        $oldpassword = $this->get('oldpassword');
			    $newpassword = $this->get('newpassword');
				 $user_id = $this->get('user_id');
				//$device_token = $this->get('device_token');
		
		 $result=$this->Login_model->change_password_api($oldpassword,$newpassword,$user_id);
		//exit;
		if($result ==1)
		{
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
		}
        else
        {
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'Passwors is Wrong'
                ));
               
        }
		
	}
	 
	 public function push_notification_get()
    {
		$device_token = $this->get('device_token');
		 $result = $this->User_model->push_notification_api($device_token);
		
	} 
	 
	 public function property_list_get()
	{
		     $success=$this->Property_model->get_property_list();	
		     echo json_encode($success);
	}
	
	public function add_tenant_property_get()
	{
		       $property_id = $this->get('property_id');
			   $user_id = $this->get('user_id');
			   
		     $result=$this->User_model->add_tenant_property($property_id,$user_id);	
		    if($result === FALSE)
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'failed'
						));
				}
				else
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success'
						));
					
				}
	}
	
	public function property_details_get()
	{
               $property_id = $this->get('property_id');
			 
		     $result=$this->Property_model->get_property_details($property_id);	
		     if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
	}
	
	public function user_details_get()
	{
		 $id=$this->get('id');
		 $result=$this->User_model->get_user_details_api($id);	
		     if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
		
		
	}
	function user_udate_get()
    {
		        $firstname = $this->get('firstname');
			    $lastname = $this->get('lastname');
			    $dob = $this->get('dob');
			   //$phone1 = $this->get('phone1');
			   $email = $this->get('email');
			   $gender = $this->get('gender');
			   $user_id = $this->get('id');
			   //$username = $phone1;
			   //$password = $this->get('password'); 
			  // $device_token = $this->get('device_token'); 
			   //$property_name = $request->property_name;
         $result = $this->User_model->update_user_api($firstname,$lastname,$dob,$email,$gender,$user_id);
         
        if($result === FALSE)
        {
            $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
        }
        else if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'User Already Exist'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		//http://192.168.1.123:8081/tenant/api/restapi/user_reg?X-API-KEY=123&firstname=test&lastname=test&phone1=11111111&email=samiran@gmail.com&user_type=1&password=123456
         
    }
	public function notification_get()
    {
		$user_id = $this->get('user_id');
		
		$result=$this->User_model->get_notification($user_id);
		if(!empty($result))
        {
            $this->response(array(
                    'status' => TRUE,
                    'message' => 'success',
					'result' => $result,
					
                ), 200); // 200 being the HTTP response code
        }
        else
        {
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'No result found'
                ));
               
        }
		
	}
	public function services_list_get()
    {
		$result=$this->Services_model->get_services_list();
		if(!empty($result))
        {
            $this->response(array(
                    'status' => TRUE,
                    'message' => 'success',
					'result' => $result,
					
                ), 200); // 200 being the HTTP response code
        }
        else
        {
			$this->response(array(
                    'status' => FALSE,
                    'message' => 'No result found'
                ));
               
        }
		
	}
	public function service_request_get()
	{
               $user_id = $this->get('user_id');
			   $services_id = $this->get('services_id');
			   $details = $this->get('details');
			   $date = $this->get('date');
			   $time = $this->get('time');
			 
		     $result=$this->Services_model->post_service_request($user_id,$services_id,$date,$time,$details);	
		     if($result>0)
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success'
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
	}
	function service_request_list_get()
    {
		 $user_id = $this->get('user_id'); 
         $result = $this->Services_model->get_services_request_list_user($user_id);
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	function requested_servicess_history_get()
    {
		 $request_service_id = $this->get('request_service_id'); 
         $result = $this->Services_model->requested_servicess_history($request_service_id);
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	public function user_payment_info_get()
	{
		     $user_id = $this->get('user_id');
		     $result=$this->Manageaccount_model->get_payment_list_api($user_id);	
		     //echo json_encode($success);
			 if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
	}
	public function funds_info_get()
	{
		     $result=$this->Manageaccount_model->get_fund_list_api();	
		     //echo json_encode($success);
			 if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
	}
	function domestic_staff_type_get()
	{
		$result=array('Driver','Cook','Milkman','Laundryman');
		$this->response(array(
                    'status' => TRUE,
                    'message' => 'success',
					'result' => $result,
                ));
	}
	function domestic_staff_get()
    {
		        $firstname = $this->get('firstname');
			    $lastname = $this->get('lastname');
			    $phone1 = $this->get('phone1');
				$address = $this->get('address');
			    $user_type = $this->get('domestic_staff_type');
			    $user_id = $this->get('user_id'); 
			   //$property_name = $request->property_name;
         $result = $this->Visitorsmanage_model->post_add_visitor_api($firstname,$lastname,$phone1,$address,$user_type,$user_id);
         
       if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		
         
    }
	function update_domestic_staff_get()
    {
		        $firstname = $this->get('firstname');
			    $lastname = $this->get('lastname');
			    $phone1 = $this->get('phone1');
				$address = $this->get('address');
			    $user_type = $this->get('domestic_staff_type');
			    $visitor_id = $this->get('domestic_staff_id'); 
			   //$property_name = $request->property_name;
         $result = $this->Visitorsmanage_model->update_add_visitor_api($firstname,$lastname,$phone1,$address,$user_type,$visitor_id);
         
       if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		
         
    }
	function delete_domestic_staff_get()
    {
			    $visitor_id = $this->get('domestic_staff_id'); 
			   
         $result = $this->Visitorsmanage_model->visitor_delete($visitor_id);
         
       if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		
         
    }
	function visitor_request_get()
    {
		        $firstname = $this->get('firstname');
			    $lastname = $this->get('lastname');
				 $perpuse = $this->get('perpuse');
			    $phone1 = $this->get('phone1');
			    $requested_user_id = $this->get('requester_user_id');
				$date = $this->get('date');
				$time = $this->get('time');
				$datetime=$date.' '.$time;
				
			   //$property_name = $request->property_name;
         $result = $this->Visitorsmanage_model->post_visitor_request($firstname,$lastname,$perpuse,$phone1,$requested_user_id,$datetime);
         
       if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		
         
    }
	function visitor_request_list_get()
    {
		 $user_id = $this->get('user_id'); 
         $result = $this->Visitorsmanage_model->ten_visitor_request_list( $user_id);
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	function security_visitor_request_list_get()
    {
		 
         $result = $this->Visitorsmanage_model->visitor_request_list();
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	function domestic_staff_list_get()
    {
		 $user_id = $this->get('user_id'); 
         $result = $this->Visitorsmanage_model->domestic_staff_list_api($user_id);
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	function security_domestic_staff_list_get()
    {
		// $user_id = $this->get('user_id'); 
         $result = $this->Visitorsmanage_model->get_visitors_list();
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	
	function sent_global_notification_get()
    {
		 $subject = $this->get('subject'); 
		 $message = $this->get('message');
         $result = $this->Security_model->post_global_notification($subject,$message);
         
        if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
   		
         
    }
	
	function visitor_checkin_notify_get()
	{
		$visitor_request_id = $this->get('visitor_request_id'); 
		 $requested_user_id = $this->get('requested_user_id');
         $result = $this->Visitorsmanage_model->visitor_check_in_time($visitor_request_id,$requested_user_id);
         
        if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
	}
	function visitor_checkout_notify_get()
	{
		$visitor_request_id = $this->get('visitor_request_id'); 
		 $requested_user_id = $this->get('requested_user_id');
         $result = $this->Visitorsmanage_model->visitor_check_out_time($visitor_request_id,$requested_user_id);
         
        if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
	}
	
	function domestic_staff_checkin_notify_get()
	{
		$domestic_staff_id = $this->get('domestic_staff_id'); 
		 $created_user_id = $this->get('created_user_id');
         $result = $this->Visitorsmanage_model->domestic_staff_check_in_time($domestic_staff_id,$created_user_id);
         
        if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
	}
	function domestic_staff_checkout_notify_get()
	{
		$domestic_staff_id = $this->get('domestic_staff_id'); 
		 $created_user_id = $this->get('created_user_id');
		 $active_statff_id = $this->get('active_statff_id');
         $result = $this->Visitorsmanage_model->domestic_staff_check_out_time($domestic_staff_id,$created_user_id,$active_statff_id);
         
        if($result === 0)
		 {
			 $this->response(array(
                    'status' => FALSE,
                    'message' => 'failed'
                ));
				
		 }
        else
        {
			$this->response(array(
                    'status' => TRUE,
                    'message' => 'success'
                ));
            
        }
	}
	
	function domestic_staff_history_get()
    {
		 $staff_id = $this->get('staff_id'); 
         $result = $this->Visitorsmanage_model->domestic_staff_history_api($staff_id);
         
       if(!empty($result))
				{
					$this->response(array(
							'status' => TRUE,
							'message' => 'success',
							'result' => $result,
							
						), 200); // 200 being the HTTP response code
				}
				else
				{
					$this->response(array(
							'status' => FALSE,
							'message' => 'No result found'
						));
					   
				}
   		
         
    }
	
}
