<?php
/*
    Description : Model for Property
    Author      : samiran
    Date        : 28/10/2016
*/
class Services_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	
	public function post_services_type($title)
	{
		 $data = array(
		 'name' =>$title,
		);

		$this->db->insert('ten_services_type', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return $id;
		}
		else
		{
			return 0;
		}
		
	}
	public function get_services_type()
	{
		 $sql1="SELECT 	* FROM  `ten_services_type` ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
		
	}
	public function delete_services_type($id)
	{
		  $sql1="delete FROM  `ten_services_type` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function update_services_type($title,$type_id)
	{
		 $data = array(
		 'name' =>$title,
		);

		$this->db->where('id',$type_id);
		$this->db->update('ten_services_type', $data);
		return 1;
		
	}
	public function post_services_data($services_name,$services_type)
	{
		 $data = array(
		 'name' =>$services_name,
		  'type' =>$services_type,
		);

		$this->db->insert('ten_services_list', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return $id;
		}
		else
		{
			return 0;
		}
		
	}
	 public function get_services_list()
	{
		     $sql1="SELECT a.id,a.type,a.name 'service_name',a.created_at 'created_at',b.name 'service_type' from  ten_services_list a left join ten_services_type b on a.type=b.id";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	} 
	public function get_services_request_list()
	{
		     $sql1="SELECT a.id,a.details,a.created_at,a.status,a.services_id,b.name,b.type,
			        c.firstname,
					c.id 'user_id',
			        c.lastname,
					c.phone1,
					c.gender,
					c.user_type,
					c.device_token
					FROM ten_service_request a
					INNER JOIN ten_services_list b ON a.services_id = b.id
					INNER JOIN tent_userdata c ON c.id = a.user_id
			       ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	} 
	public function get_services_request_list_user($user_id)
	{
		     $sql1="SELECT a.id,a.details,a.created_at,a.status,
			 DATE(a.datetime) 'service_date',
			 TIME(a.datetime) 'service_time',
			 a.services_id,b.name,b.type,
			        c.firstname,
					c.id 'user_id',
			        c.lastname,
					c.phone1,
					c.gender,
					c.user_type,
					c.device_token
					FROM ten_service_request a
					INNER JOIN ten_services_list b ON a.services_id = b.id
					INNER JOIN tent_userdata c ON c.id = a.user_id
					where a.user_id=".$user_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function requested_servicess_history($request_service_id)
	{
		$sql1="select *  from ten_service_request_response where requist_id=".$request_service_id." order by id desc";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function update_services($name,$service_id,$services_type)
	{
		 $data = array(
		 'name' =>$name,
		    'type' =>$services_type
		);

		$this->db->where('id',$service_id);
		$this->db->update('ten_services_list', $data);
		return 1;
		
		
	}
	public function services_list_delete($id)
	{
		  $sql1="delete FROM  `ten_services_list` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function post_service_request($user_id,$services_id,$date,$time,$details)
	{
		$data = array(
		 'user_id' =>$user_id,
		 'services_id' =>$services_id,
		 'details' =>$details,
		 'datetime'=>$date.' '.$time,
		);

		$this->db->insert('ten_service_request', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return $id;
		}
		else
		{
			return 0;
		}
	}
	public function services_request_delete($id)
	{
		  $sql1="delete FROM  `ten_service_request` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
}