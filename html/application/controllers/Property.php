<?php
/*
	Description:Controller for Property
	Author:samiran
	Date:27/3/2017
*/
class Property extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Property_model');
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
		$this->load->view('Property/List',$data);
		$this->load->view('common_footer');
		
		
	}
	 public function add_property()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Property/Addproperty',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_property_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $property_name = $request->property_name;
			   $property_type = $request->property_type;
			   $address = $request->address;
			   $country = $request->country;
			   $state = $request->state;
			   $city = $request->city;
			   $zip = $request->zip;
		     $success=$this->Property_model->post_property_data($property_name,$property_type,$address,$country,$state,$city,$zip);	
		     echo json_encode($success);
	}
	public function update_property_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $property_name = $request->property_name;
			   $property_type = $request->property_type;
			   $address = $request->address;
			   $country = $request->country;
			   $state = $request->state;
			   $city = $request->city;
			   $zip = $request->zip;
			   $property_id = $request->property_id;
			   
		     $success=$this->Property_model->update_property_data($property_name,$property_type,$address,$country,$state,$city,$zip,$property_id);	
		     echo json_encode($success);
	}
	
	public function get_property_list()
	{
		     $success=$this->Property_model->get_property_list();	
		     echo json_encode($success);
	}
  /*public function user_type_list()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('User/Typelist',$data);
		$this->load->view('common_footer');
		
		
	} */
	public function add_property_type()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Property/Addtype',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_property_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $title = $request->title;
			  $no_of_floor = $request->no_of_floor;
			
			 //$title ='test';
		     $success=$this->Property_model->post_property_type($title,$no_of_floor);	
		     echo json_encode($success);
	}
	public function update_property_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			  $title = $request->title;
			  $type_id = $request->type_id;
			 //$title ='test';
		     $success=$this->Property_model->update_property_type($title,$type_id);	
		     echo json_encode($success);
	}
	public function delete_property_type()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $type_id = $request->id;
			 //$title ='test';
		     $success=$this->Property_model->delete_property_type($type_id);	
		     echo json_encode($success);
	}
	
	public function get_property_type()
	{
		     $success=$this->Property_model->get_property_type();	
		     echo json_encode($success);
	}
	
	public function get_property_details()
	{
               $postdata = file_get_contents("php://input");
		       $request = json_decode($postdata);
			     $property_id =$request->p_id;
			    //$property_id = 2;
			 
		     $success=$this->Property_model->get_property_details($property_id);	
		     echo json_encode($success);
	}
	public function view_property_details()
	{
		     $property_id=$this->uri->segment(3);
             $data['user_info'] =$this->session->userdata('user_info');
			 $data['data'] =$this->Property_model->view_property_details($property_id);
			 // print_r($data);exit;
			$this->load->view('common_header');
			$this->load->view('common_sidemenu',$data);
			$this->load->view('Property/Details',$data);
			$this->load->view('common_footer');
		    
	}
	public function edit_property_details($id)
	{
		 $id=$this->uri->segment(3);
		//$success=$this->User_model->get_user_details($id);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->Property_model->edit_property_details($id);
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Property/Editproperty',$data);
		$this->load->view('common_footer');
		
		
	}
	public function property_list_delete()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			//$id=18;
		$success=$this->Property_model->property_list_delete($id);	
		echo json_encode($success);
	}
}