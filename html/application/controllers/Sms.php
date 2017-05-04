<?php
/*
	Description:Controller for Sms
	Author:samiran
	Date:27/3/2017
*/
class Sms extends CI_Controller
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
		$this->load->view('Sms/Main',$data);
		$this->load->view('common_footer');
		
		
	}
	public function sms_sent()
	{
		    /*  $success=$this->Property_model->get_property_list();	
		     echo json_encode($success); */
	  
      /*  $password = '11111';

       file_get_contents("http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=abc&pwd=$password&to=9093475375&sid=senderid&msg=test%20message&fl=0"); */
	           
			                $curl = curl_init();

							curl_setopt_array($curl, array(
							  CURLOPT_URL => "http://2factor.in/API/V1/293832-67745-11e5-88de-5600000c6b13/SMS/991991199/AUTOGEN",
							  CURLOPT_RETURNTRANSFER => true,
							  CURLOPT_ENCODING => "",
							  CURLOPT_MAXREDIRS => 10,
							  CURLOPT_TIMEOUT => 30,
							  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  CURLOPT_CUSTOMREQUEST => "GET",
							  CURLOPT_POSTFIELDS => "{}",
							));

							$response = curl_exec($curl);
							$err = curl_error($curl);

							curl_close($curl);

							if ($err) {
							  echo "cURL Error #:" . $err;
							} else {
							  echo $response;
							}
	   
	   

	}
}