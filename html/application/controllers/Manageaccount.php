<?php
/*
	Description:Controller for ManageAccount
	Author:samiran
	Date:27/3/2017
*/
class Manageaccount extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Manageaccount_model');
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
		$this->load->view('Manageaccount/Main',$data);
		$this->load->view('common_footer');
		
		
	}
	public function payment_list()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Manageaccount/List',$data);
		$this->load->view('common_footer');
		
		
	}
	public function fund_list()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Manageaccount/Fundlist',$data);
		$this->load->view('common_footer');
		
		
	}
	public function edit_account($id)
	{
		$id=$this->uri->segment(3);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['data']=$this->Manageaccount_model->edit_account($id);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Manageaccount/Editaccount',$data);
		$this->load->view('common_footer');
		
		
	}
	public function post_manageaccount_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   $due_date = $request->due_date;
			   $paid_date = $request->paid_date;
			   $description = $request->description;
			   $amount_due = $request->amount_due;
			   $amount_paid = $request->amount_paid;
			   $amount_remain = $request->amount_remain;
			   $payment_type = $request->payment_type;
			   $payment_category = $request->payment_category;
			   $tenant_user = $request->tenant_user;
			   $property = $request->property;
			  
		     $success=$this->Manageaccount_model->post_manageaccount_data($due_date,$paid_date,$description,$amount_due,$amount_paid,$amount_remain,$payment_type,$payment_category,$tenant_user,$property);	
		     echo json_encode($success);
	}
	public function post_managefund_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    
			   
			   $paid_date = $request->paid_date;
			   $description = $request->description;
			  
			   $amount_paid = $request->amount_paid;
			  
			   $payment_type = $request->payment_type;
			   $payment_category = $request->payment_category;
			 
			   
			  
		     $success=$this->Manageaccount_model->post_managefund_data($paid_date,$description,$amount_paid,$payment_type,$payment_category);	
		     echo json_encode($success);
	}
	public function update_manageaccount_data()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    //print_r($request);
			     $due_date = $request->due_date->value;
			     $paid_date = $request->paid_date->value; 
				
				//echo date('Y-m-d h:m:s', strtotime($due_date. "+1 days"));
				
			   $description = $request->description;
			   $amount_due = $request->amount_due;
			   $amount_paid = $request->amount_paid;
			   $amount_remain = $request->amount_remain;
			   $payment_type = $request->payment_type;
			   $payment_category = $request->payment_category;
			   $tenant_user = $request->tenant_user;
			    $property = $request->property;
			    $payment_id = $request->payment_id;
				//exit;
			  
		      $success=$this->Manageaccount_model->update_manageaccount_data($due_date,$paid_date,$description,$amount_due,$amount_paid,$amount_remain,$payment_type,$payment_category,$tenant_user,$property,$payment_id);	
		     echo json_encode($success); 
	}
	public function get_payment_list()
	{
		     $success=$this->Manageaccount_model->get_payment_list();	
		     echo json_encode($success);
	}
	public function get_fund_list()
	{
		     $success=$this->Manageaccount_model->get_fund_list();	
		     echo json_encode($success);
	}
	public function payment_list_delete()
	{
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 
		     $id = $request->id;
		     $success=$this->Manageaccount_model->payment_list_delete($id);	
		     echo json_encode($success);
	}
	
	public function manage_fund()
	{
		$data['user_info'] =$this->session->userdata('user_info');
		//print_r($data);
		$this->load->view('common_header');
		$this->load->view('common_sidemenu',$data);
		$this->load->view('Manageaccount/Fundadd',$data);
		$this->load->view('common_footer');
	}
}