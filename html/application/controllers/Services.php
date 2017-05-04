<?php
/*
	Description:Controller for Services
	Author:samiran
	Date:27/3/2017
*/
class Services extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Services_model');
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
		$this->load->view('Services/List',$data);
		$this->load->view('common_footer');
		
		
	}
	  public function add_services()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Services/Addservices',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_services_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $services_name = $request->services_name;
			  $services_type = $request->services_type;
		     $success=$this->Services_model->post_services_data($services_name,$services_type);	
		     echo json_encode($success);
	}
	public function get_services_list()
	{
		     $success=$this->Services_model->get_services_list();	
		     echo json_encode($success);
	}
	public function update_services()
	{
		   $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $name = $request->name;
			   $service_id = $request->service_id;
			  $services_type = $request->services_type;
		     $success=$this->Services_model->update_services($name,$service_id,$services_type);	
		     echo json_encode($success);
	}
	
	
   
	public function add_services_type()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Services/Addtype',$data);
		$this->load->view('common_footer');
		
		
	}
	 public function post_services_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $title = $request->title;
			 //$title ='test';
		     $success=$this->Services_model->post_services_type($title);	
		     echo json_encode($success);
	}
	public function delete_services_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		      $id = $request->id;
			 //$title ='test';
		     $success=$this->Services_model->delete_services_type($id);	
		     echo json_encode($success);
	} 
	 public function update_services_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $title = $request->title;
			  $type_id = $request->type_id;
			 //$title ='test';
		     $success=$this->Services_model->update_services_type($title,$type_id);	
		     echo json_encode($success);
	}
	
	
	public function get_services_type()
	{
		     $success=$this->Services_model->get_services_type();	
		     echo json_encode($success);
	}
	public function services_list_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->Services_model->services_list_delete($id);	
		echo json_encode($success);
	} 
	 public function services_request_list()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Services/Requestlist',$data);
		$this->load->view('common_footer');
		
		
	}
	public function get_services_request_list()
	{
		     $success=$this->Services_model->get_services_request_list();	
		     echo json_encode($success);
	}
	public function services_request_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->Services_model->services_request_delete($id);	
		echo json_encode($success);
	} 
	public function service_notify_user()
	{     
	      $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     //print_r($request);
			  $request_id = $request->request_id;
			   $service_response_detais = $request->service_response_detais;
			   $user_id = $request->user_id;
			  $device_token = $request->device_token;
			  $status = $request->status;
			  
			 //exit;
			  
			  $success=$this->User_model->service_notify_user($request_id,$service_response_detais,$user_id,$device_token, $status);	
		     echo ($success);
			
	}
}