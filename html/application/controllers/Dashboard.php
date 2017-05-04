<?php
/*
	Description:Controller for Dashboard
	Author:samiran
	Date:27/3/2017
*/
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('dashboard_model');
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
		$this->load->view('Dashboard/Main',$data);
		$this->load->view('common_footer');
		
		
	}
	
}