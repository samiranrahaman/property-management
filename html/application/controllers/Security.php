<?php
/*
	Description:Controller for Security
	Author:samiran
	Date:27/3/2017
*/
class Security extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Security_model');
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
		$this->load->view('Security/List',$data);
		$this->load->view('common_footer');
	}
	public function sent_global_notification()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Security/Sentnotification',$data);
		$this->load->view('common_footer');
		
		
	}
	function post_global_notification()
	{
		
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $subject = $request->subject;
			   $message = $request->message;
			   
			  
		     $success=$this->Security_model->post_global_notification($subject,$message);	
		     echo json_encode($success);
	}
	public function global_notification_list()
	{
		     $success=$this->Security_model->global_notification_list();	
		     echo json_encode($success);
	}
}