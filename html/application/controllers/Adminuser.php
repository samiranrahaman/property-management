<?php
/*
	Description:Controller for AdminUser
	Author:samiran
	Date:27/3/2017
*/
class Adminuser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Adminuser_model');
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
		$this->load->view('Adminuser/List',$data);
		$this->load->view('common_footer');
		
		
	}
	public function add_user()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Adminuser/Adduser',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_add_user()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			    $firstname = $request->firstname;
			    $lastname = $request->lastname;
			   //$dob = $request->dob;
			   $phone1 = $request->phone1;
			   $email = $request->email;
			   $user_type = $request->user_type;
			   $username = $request->username;
			   $password = $request->password;
				  
			 //print_r($request);exit;
		     $success=$this->Adminuser_model->post_add_user($firstname,$lastname,$phone1,$email,$user_type,$username,$password);	
		     echo json_encode($success);
	}
	public function update_add_user()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     //print_r($request);exit;
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $phone1 = $request->phone1;
			   $email = $request->email;
			     $user_type = $request->user_type;
				 
				  $user_id = $request->user_id;
				  
			  
		     $success=$this->Adminuser_model->update_add_user($firstname,$lastname,$phone1,$email,$user_type,$user_id);	
		     echo json_encode($success);
	}
	public function get_user_list()
	{
		     $success=$this->Adminuser_model->get_user_list();	
		     echo json_encode($success);
	}
	
	
	/* public function get_user_details($id)
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
		
		
	} */
	public function edit_user_details($id)
	{
		 $id=$this->uri->segment(3);
		if($id==1)
		{
		   redirect('Login');
		}
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->Adminuser_model->edit_user_details($id);
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Adminuser/Edituser',$data);
		$this->load->view('common_footer');
		
		
	}
	
	public function user_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->Adminuser_model->user_delete($id);	
		echo json_encode($success);
	}
	
	public function user_status()
	{
		$postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 $id = $request->id;
			 $success=$this->Adminuser_model->user_status($id);
            
			echo $success;
			
	}
}