<?php
class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			   $this->load->model('Login_model');				
		}
	

        public function index()
        {
        	$this->session->unset_userdata('user_info');
			$this->load->view("login_view");
        }
        
        public function verify_login()
        {        	
			 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $user_name = $request->username;
		     $password = $request->passwrd; 
			 //$user_name ='admin';
		     //$password ='admin';
			 
			 $success=$this->Login_model->verify_login_credintial($user_name,$password);	
			// $success=$this->Login_model->verify_login_credintial('admin','admin');	
			 //print_r($success);	
			 if(isset($success)) 
			 {
			 	
			 	//$this->session->set_userdata('user_info',$success[0]);
				$this->session->set_userdata('user_info',$success);
			 	//echo true;
			    $return_value=array('status'=>"1");
				echo json_encode($return_value);
			 }
			 else
			 {
				// echo false;
				$return_value=array('status'=>"0");
				echo json_encode($return_value);
			 } 
			 
	            
			
		}
		public function forgotPassword()
		{
			$where=array();
			$where=array(
				"admin_username"=>$this->input->post('user_name'),
				"admin_email_id"=>$this->input->post('user_name')
				);
			$success=$this->Login_model->password_update("zulekha_admin",$where);
			if($success['result']==0)
			{
				echo 0;
				//echo "User Name/Email does not exists!";
			}
			else
			{
				$response=$this->send_mail($success);
				//echo "New Password sent to your mail id";
				echo 1;
			}
			// print_r($where);

		}

		public function send_mail($info)
		{
			
			$to=$info['result'][0]->admin_email_id;
			// $to="satishkumarv@lancesoft-india.com";
			$user_name=$info['result'][0]->admin_username;
			$password=$info['new_password'];

			$subject="New Password from Zulekha";
			$message="Hi ".$user_name." Your new password is ".$password;
			

				$_SESSION['mail_status'] = 0;		 

				$smtpServer = "smtpout.secureserver.net";
				$port = "25";
				//$to="sapnas@lancesoft-india.com";
				//$to="satishkumarv@lancesoft-india.com";
				//$to1="swaminathans@lancesoft.com";
				$timeout = "30";
				$username = "intraapp@lancesoft-india.com";
				$password = "Cool@4567";
				$localhost = "smtpout.secureserver.net";
				$newLine = "\r\n";

				$from='lancecast@lancesoft-india.com';
				//Connect to the host on the specified port  
				$smtpConnect = fsockopen($smtpServer, $port, $errno, $errstr, $timeout);  
				$smtpResponse = fgets($smtpConnect, 515);  
				if(empty($smtpConnect))   
				{  
				$output = "Failed to connect: $smtpResponse";  
				return $output;  
				}  
				else 
				{  
				$logArray['connection'] = "Connected: $smtpResponse";  
				$_SESSION['mail_status'] = 1;
				}  
		

				fputs($smtpConnect,"AUTH LOGIN" . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['authrequest'] = "$smtpResponse";  
		

				fputs($smtpConnect, base64_encode($username) . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['authusername'] = "$smtpResponse";  
		

				fputs($smtpConnect, base64_encode($password) . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['authpassword'] = "$smtpResponse";  
		

				fputs($smtpConnect, "HELO $localhost" . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['heloresponse'] = "$smtpResponse";  
		
			 
				fputs($smtpConnect, "MAIL FROM: $from" . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['mailfromresponse'] = "$smtpResponse";  
		
	
				fputs($smtpConnect, "RCPT TO: $to" . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['mailtoresponse'] = "$smtpResponse";  
		
	
				fputs($smtpConnect, "DATA" . $newLine);  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['data1response'] = "$smtpResponse";  
		
		
				$headers= "Reply-To: Lancecast <lancecast@lancesoft-india.com> \r\n";
				$headers.= "Return-Path: Lancecast <lancecast@lancesoft-india.com> \r\n";	 
				$headers.= 'From: Lancecast<lancecast@lancesoft-india.com>' . "\r\n";  
				$headers.= 'MIME-Version: 1.0' . "\r\n";
				$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		
				fputs($smtpConnect, "To: $to\nFrom: $from\nSubject: $subject\n$headers\n\n$message\n.\n");  
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['data2response'] = "$smtpResponse";  

				fputs($smtpConnect,"QUIT" . $newLine);   
				$smtpResponse = fgets($smtpConnect, 515);  
				$logArray['quitresponse'] = "$smtpResponse";  
		}


		public function changePassword()
		{
			$session_data=$this->session->userdata('user_info');
			$login_id=$session_data->admin_interanal_id;
			$where=array();
			$where=array(
				"admin_interanal_id"=>$login_id,
				"admin_password"=>base64_encode($this->input->post('curr_pswd'))
				);
			$update=array(
				"admin_password"=>base64_encode($this->input->post('new_pswd'))
				);
			$success=$this->Login_model->change_password('zulekha_admin',$where,$update);
			echo $success;
		}
		
		public function logout()
		{
			$this->session->unset_userdata('user_info');
			//redirect('Login','refresh');
			//redirect('Dashboard','refresh');
			redirect('http://138.197.54.179/'); 
		}
}
