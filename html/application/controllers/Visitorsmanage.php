<?php
/*
	Description:Controller for Visitorsmanage
	Author:samiran
	Date:27/3/2017
*/
class Visitorsmanage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Visitorsmanage_model');
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
		$this->load->view('Visitorsmanage/List',$data);
		$this->load->view('common_footer');
		
		
	}
	public function add_user()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Visitorsmanage/Addvistios',$data);
		$this->load->view('common_footer');
		
		
	}
	public function sent_visitor_request()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Visitorsmanage/Visitorsrequest',$data);
		$this->load->view('common_footer');
		
		
	}
	public function visitors_request()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Visitorsmanage/Requestlist',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_visitor_request()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     // print_r($request);exit;
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $phone1 = $request->phone1;
			   $requested_user_id = $request->user_id;
			   $perpuse =$request->perpuse;
			     $datetime =$request->datetime;
			 
		     $success=$this->Visitorsmanage_model->post_visitor_request($firstname,$lastname,$perpuse,$phone1,$requested_user_id,$datetime);	
		     echo json_encode($success);
	}
	public function post_add_user()
	{
		     $userinfo=$this->session->userdata('user_info');
			 //print_r($userinfo);
			 $admin_id=$userinfo[0]->admin_id;
			 
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $phone1 = $request->phone1;
			   $user_type = $request->user_type;
			$datetime = $request->datetime;
			  
		     $success=$this->Visitorsmanage_model->post_add_user($firstname,$lastname,$phone1,$user_type,$admin_id,$datetime);	
		     echo json_encode($success);
	}
	public function get_visitors_list()
	{
		     $success=$this->Visitorsmanage_model->get_visitors_list();	
		     echo json_encode($success);
	}
	public function visitor_request_list()
	{
		 $success=$this->Visitorsmanage_model->visitor_request_list();	
		     echo json_encode($success);
	}
	public function visitor_delete()
	{
		 $postdata = file_get_contents("php://input");
		 $request = json_decode($postdata);
		 $id = $request->id;
		
		$success=$this->Visitorsmanage_model->visitor_delete($id);	
		echo json_encode($success);
	}
	public function edit_visitor_details($id)
	{
		 $id=$this->uri->segment(3);
		//$success=$this->User_model->get_user_details($id);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->Visitorsmanage_model->edit_visitor_details($id);
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Visitorsmanage/Editvisitor',$data);
		$this->load->view('common_footer');
		
		
	}
	function update_visitor_user()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $firstname = $request->firstname;
			   $lastname = $request->lastname;
			   $phone1 = $request->phone1;
			   $user_type = $request->user_type;
			  $visitor_id = $request->visitor_id;
			  $datetime = $request->datetime;
				  
			  
		     $success=$this->Visitorsmanage_model->update_visitor_user($firstname,$lastname,$phone1,$user_type,$visitor_id,$datetime);	
		     echo json_encode($success);
	}
	function visitor_check_in_time()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		   //print_r($request);
			   $id = $request->id;
			   $requested_user_id = $request->requested_user_id; 
			    //$id = 3;
			  //$requested_user_id = 8;
			   
			//exit;	  
			  
		     $success=$this->Visitorsmanage_model->visitor_check_in_time($id,$requested_user_id);	
		     echo json_encode($success);
	}
	function visitor_check_out_time()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		   //print_r($request);
			   $id = $request->id;
			   $requested_user_id = $request->requested_user_id; 
			    //$id = 3;
			  //$requested_user_id = 8;
			   
			//exit;	  
			  
		     $success=$this->Visitorsmanage_model->visitor_check_out_time($id,$requested_user_id);	
		     echo json_encode($success);
	}
	function domestic_staff_check_in_time()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		   //print_r($request);
			   $id = $request->id;
			   $requested_user_id = $request->requested_user_id; 
			    //$id = 3;
			  //$requested_user_id = 8;
			   
			//exit;	  
			  
		     $success=$this->Visitorsmanage_model->domestic_staff_check_in_time($id,$requested_user_id);	
		     echo json_encode($success);
	}
	function domestic_staff_check_out_time()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		   //print_r($request);
			   $id = $request->id;
			   $requested_user_id = $request->requested_user_id; 
			   $active_statff_id = $request->active_statff_id; 
			   
			    //$id = 3;
			  //$requested_user_id = 8;
			   
			//exit;	  
			  
		     $success=$this->Visitorsmanage_model->domestic_staff_check_out_time($id,$requested_user_id, $active_statff_id);	
		     echo json_encode($success);
	}
}