<?php

class Login_model extends CI_Model
{
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function verify_login_credintial($username,$password)
        {
			
			//$password=base64_encode($password);
			$password=md5($password);
        	
			/* $sql="SELECT * FROM `ten_admin` a inner join ten_authorization_rule b 
			on a.admin_role_id=b.role_id
			WHERE `admin_username`='$username' and `admin_password`='$password'"; */
			
			
			 $sql="SELECT * FROM `ten_admin` WHERE `admin_username`='$username' and `admin_password`='$password'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			
			if(!empty($query_userdetails2))
			{
				if($query_userdetails2[0]->admin_role_id==0)
				{
					
					array_push($query_userdetails2,array('user'=>'admin','resource_id'=>'all'));
				}
				else
				{
					$sql="SELECT * FROM ten_authorization_rule WHERE role_id=".$query_userdetails2[0]->admin_role_id;
			        $query_permission = $this->db->query($sql);
			        $query_permission_result=$query_permission->result(); 
					array_push($query_userdetails2,array('user'=>'other','resource_id'=>$query_permission->row()->resource_id));
					//array_merge($query_userdetails2,$query_userdetails2);
				}
			    //echo "<pre>";print_r($query_userdetails2);exit;
				return $query_userdetails2;
                // print_r($this->db->last_query());
			}
			
			
        }
        
		public function verify_login_credintial_api($username,$password,$device_token)
        {
			
			//$password=base64_encode($password);
			$password=md5($password);
        	
			$sql="SELECT * FROM `tent_userdata` WHERE `username`='$username' and `password`='$password'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			//echo "<pre>";print_r($query_userdetails2);
			if(!empty($query_userdetails2))
			{
				
				if($query_userdetails->row()->status>0)
				{
					 $data = array(
		                'device_token'=>$device_token,
		                          );
					$this->db->where('username',$username);
					$this->db->update('tent_userdata', $data);
					
					return $query_userdetails2;
				}
				else
				{
					return 1;
				}
				
                
			}
			else
			{
				return 0;
			}
			
			
        }
    
         public function change_password_api($oldpassword,$newpassword,$user_id)
        {
			
			//$password=base64_encode($password);
			$oldpassword=md5($oldpassword);
        	
			 $sql="SELECT * FROM `tent_userdata` WHERE `id`='$user_id' and `password`='$oldpassword'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			//echo "<pre>";print_r($query_userdetails2);
			if(!empty($query_userdetails2))
			{
				
					 $data = array(
		                'password'=>md5($newpassword),
		                          );
					$this->db->where('id',$user_id);
					$this->db->update('tent_userdata', $data);
					
					return 1;
				
			}
			else
			{
				return 0;
			}
			
			
        }
}

?>
