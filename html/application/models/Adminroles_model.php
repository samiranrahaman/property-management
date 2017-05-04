<?php
/*
    Description : Model for Adminroles
    Author      : samiran
    Date        : 28/10/2016
*/
class Adminroles_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    public function post_role($title,$resource_list)
	{
		
			  $data = array(
		      'roll_name' =>$title,
		      'resource_id' =>$resource_list,
		);

		$this->db->insert('ten_authorization_rule', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		 return $id;
		
	}
	public function get_roles()
	{
		 $sql1="SELECT 	* FROM  `ten_authorization_rule` ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
		
	}
	public function role_delete($id)
	{
		  $sql1="delete FROM  `ten_authorization_rule` where role_id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function edit_role($id)
	{
		  $sql1="select * FROM  `ten_authorization_rule` where role_id=".$id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function update_role($role_id,$title,$resource_list)
	{
		  $data = array(
		      'roll_name' =>$title,
		      'resource_id' =>$resource_list,
		);
		//print_r($data);
		 $this->db->where('role_id',$role_id);
        $this->db->update('ten_authorization_rule', $data);
		return 1;
	}
	
	
}