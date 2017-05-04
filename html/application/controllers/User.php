<?php
/*
	Description:Controller for User
	Author:samiran
	Date:27/3/2017
*/
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_model');
		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		}
	}
	public function index()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/List',$data);
		$this->load->view('common_footer');
		
		
	}
	public function add_user()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Adduser',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_add_user()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $dob = $request->dob;
			   $phone1 = $request->phone1;
			   $email = $request->email;
			     $user_type = $request->user_type;
				  $property_name = $request->property_name;
			  
		     $success=$this->User_model->post_add_user($firstname,$lastname,$dob,$phone1,$email,$user_type,$property_name);	
		     echo json_encode($success);
	}
	public function update_add_user()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $dob = $request->dob;
			   $phone1 = $request->phone1;
			   $email = $request->email;
			     $user_type = $request->user_type;
				  $property_name = $request->property_name;
				  $user_id = $request->user_id;
				  
			  
		     $success=$this->User_model->update_add_user($firstname,$lastname,$dob,$phone1,$email,$user_type,$property_name,$user_id);	
		     echo json_encode($success);
	}
	public function get_user_list()
	{
		     $success=$this->User_model->get_user_list();	
		     echo json_encode($success);
	}
	public function user_type_list()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Typelist',$data);
		$this->load->view('common_footer');
		
		
	}
	public function add_user_type()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Addtype',$data);
		$this->load->view('common_footer');
		
		
	}
	public function get_user_details($id)
	{
		 $id=$this->uri->segment(3);
		//$success=$this->User_model->get_user_details($id);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->User_model->get_user_details($id);
		//print_r($data);exit;
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Details',$data);
		$this->load->view('common_footer'); 
		
		
	}
	public function edit_user_details($id)
	{
		 $id=$this->uri->segment(3);
		//$success=$this->User_model->get_user_details($id);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->User_model->edit_user_details($id);
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Edituser',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_user_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $title = $request->title;
			 //$title ='test';
		     $success=$this->User_model->post_user_type($title);	
		     echo json_encode($success);
	}
	public function get_user_type()
	{
		     $success=$this->User_model->get_user_type();	
		     echo json_encode($success);
	}
	public function usertype_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->User_model->usertype_delete($id);	
		echo json_encode($success);
	}
	public function user_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->User_model->user_delete($id);	
		echo json_encode($success);
	}
	public function usertype_update()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 $title = $request->title;
		    $type_id = $request->type_id;
			//$id=18;
		$success=$this->User_model->usertype_update($title,$type_id);	
		echo json_encode($success);
	}
	public function user_status()
	{
		$postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			$id = $request->id;
			 $device_token=$request->device_token; 
			
			/* $id =8;
		   $device_token='c7zUkU_mp0E:APA91bGV8cfXwAV7azyZBddFOHPXcolxQNzHbLcsSY9nN-ZSrY1SMUGMCR4_981AVlvh4SdTsRdDwl32oWfk8n6YKtManoT7sCjcsGMAdL9bP8FZyoSt7TOqdYZ3_9tXqafkRDpuh61_'; */
			
			 //$result = $this->User_model->push_notification_api($device_token);
			 $success=$this->User_model->user_status($id,$device_token);
             //array_merge($success,$result);			 
		    // echo json_encode($success);
			echo $success;
			 //echo json_encode($result);
	}
}