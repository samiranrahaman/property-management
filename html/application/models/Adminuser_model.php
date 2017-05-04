<?php
/*
    Description : Model for User
    Author      : samiran
    Date        : 28/10/2016
*/
class Adminuser_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	public function post_add_user($firstname,$lastname,$phone1,$email,$user_type,$username,$password)
	{
		$sql1="SELECT * FROM  `ten_admin` where admin_username='".$username."'";
		 $query1= $this->db->query($sql1);
		 if($query1->num_rows()>0 )
		 {
			return 0;
		 }
		 else
		 {
		 
		$data = array(
		 'admin_first_name' =>$firstname,
		  'admin_last_name' =>$lastname,
		   'admin_mobile_number' =>$phone1,
			'admin_email_id' =>$email,
			'admin_role_id' =>$user_type,
			'admin_username' =>$username,
			'admin_password' =>md5($password),
			'adminadmin_status'=>1,
		);
		$this->db->insert('ten_admin', $data);
		$id=$this->db->insert_id() ; 
		 return $id;
		 }

		
		
	}
	public function update_add_user($firstname,$lastname,$phone1,$email,$user_type,$user_id)
	{
		if($user_id!=1)
		{
			
		$data = array(
		 'admin_first_name' =>$firstname,
		  'admin_last_name' =>$lastname,
		   'admin_mobile_number' =>$phone1,
			'admin_email_id' =>$email,
			'admin_role_id' =>$user_type,
			
		);
        $this->db->where('admin_id',$user_id);
		$this->db->update('ten_admin', $data);
		return 1;
		}
		else
		{
			return 0;
		}
		
	}
	
	
	public function get_user_list()
	{
		    $sql1="SELECT * from ten_admin where admin_role_id >0";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	
	public function edit_user_details($id)
	{
		     $sql1="SELECT 	* FROM  `ten_admin` where admin_id=".$id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function user_status($id)
	{
		 $sql1="SELECT 	* FROM  `ten_admin` where admin_id=".$id;
		 $query1= $this->db->query($sql1);
		
		 if($query1->row()->adminadmin_status>0)
		 {
		 $sql1="update `ten_admin` set adminadmin_status=0 where admin_id=".$id;
		 $query1= $this->db->query($sql1);
		 return 1;
		 }
		 else
		 {
		$sql1="update `ten_admin` set adminadmin_status=1 where admin_id=".$id;
		$query1= $this->db->query($sql1);
		return 1;
		 }
		 
		
	}
	public function user_delete($id)
	{
		  $sql1="delete FROM  `ten_admin` where admin_id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
}