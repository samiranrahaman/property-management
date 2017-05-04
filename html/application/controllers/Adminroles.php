<?php
/*
	Description:Controller for User
	Author:samiran
	Date:27/3/2017
*/
class Adminroles extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Adminroles_model');
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
		$this->load->view('Adminroles/List',$data);
		$this->load->view('common_footer');
		
		
	}
	public function add_role()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Adminroles/Addrole',$data);
		$this->load->view('common_footer');
		
		
	}
	public function edit_roles()
	{
		 $id=$this->uri->segment(3);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->Adminroles_model->edit_role($id);
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Adminroles/Editrole',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_role()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    //print_r($request);
			  $title = $request->title; 
			  $resource_list = json_encode($request->resource_list);
			 //$title ='test';
		     $success=$this->Adminroles_model->post_role($title,$resource_list);	
		     echo json_encode($success);
	}
	public function get_roles()
	{
		     $success=$this->Adminroles_model->get_roles();	
		     echo json_encode($success);
	}
	public function role_delete()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 $id = $request->id;
			
		$success=$this->Adminroles_model->role_delete($id);	
		echo json_encode($success);
	}
	public function update_role()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 //print_r($request);exit;
			 $role_id = $request->role_id;
			 $title = $request->title; 
			 $resource_list = json_encode($request->resource_list);
		$success=$this->Adminroles_model->update_role($role_id,$title,$resource_list);	
		echo json_encode($success);
	}
	
}