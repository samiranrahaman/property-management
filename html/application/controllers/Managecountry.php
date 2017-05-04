<?php
/*
	Description:Controller for Managecountry
	Author:samiran
	Date:27/3/2017
*/
class Managecountry extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Managecountry_model');
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
		$this->load->view('Managecountry/Main',$data);
		$this->load->view('common_footer');
		
		
	}
	public function get_country()
	{
		$success=$this->Managecountry_model->get_country();
		 echo json_encode($success);
	}
	public function get_selected_country()
	{
		$success=$this->Managecountry_model->get_selected_country();
		 echo json_encode($success);
	}
	public function allow_country()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			$country_name = $request->countryname;
			//$country_name ='Afghanistan';
		$success=$this->Managecountry_model->allow_country($country_name);
		 echo json_encode($success);
	}
	public function get_allow_country()
	{
		$success=$this->Managecountry_model->get_allow_country();
		 echo json_encode($success);
	}
	public function get_allow_state()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			$country_id = $request->country_id;
			
		$success=$this->Managecountry_model->get_allow_state($country_id);
		 echo json_encode($success);
	}
	public function get_allow_city()
	{
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			$state_id = $request->state_id;
			
		$success=$this->Managecountry_model->get_allow_city($state_id);
		 echo json_encode($success);
	}
	
	
}