<?php
/*
    Description : Model for Property
    Author      : samiran
    Date        : 28/10/2016
*/
class Property_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	
	public function post_property_type($title,$no_of_floor)
	{
		 $data = array(
		 'title' =>$title,
		 'no_of_floor'=>$no_of_floor,
		);

		$this->db->insert('ten_property_type', $data);
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
	public function update_property_type($title,$type_id)
	{
		 $data = array(
		 'title' =>$title,
		);

		$this->db->where('id',$type_id);
		$this->db->update('ten_property_type', $data);
		return 1;
		
	}
	public function delete_property_type($id)
	{
		  $sql1="delete FROM  `ten_property_type` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function get_property_type()
	{
		 $sql1="SELECT 	* FROM  `ten_property_type` ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
		
	}
	public function usertype_delete($id)
	{
		  $sql1="delete FROM  `ten_user_type` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function usertype_update($title,$type_id)
	{
		  $sql1="update `ten_user_type`  set name='".$title."' where id=".$type_id;
		  $query1= $this->db->query($sql1);
	      return 1;
	}
	
	public function post_property_data($property_name,$property_type,$address,$country,$state,$city,$zip)
	{
		 $data = array(
		 'name' =>$property_name,
		  'property_type' =>$property_type,
		   'address' =>$address,
		    'country' =>$country,
			 'state' =>$state,
			  'city' =>$city,
			   'zip' =>$zip,
		);

		$this->db->insert('ten_propert_list', $data);
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
	public function update_property_data($property_name,$property_type,$address,$country,$state,$city,$zip,$property_id)
	{
		 $data = array(
		 'name' =>$property_name,
		  'property_type' =>$property_type,
		   'address' =>$address,
		    'country' =>$country,
			 'state' =>$state,
			  'city' =>$city,
			   'zip' =>$zip,
		);

		$this->db->where('id',$property_id);
		$this->db->update('ten_propert_list', $data);
		return 1;
		
		
	}
	 public function get_property_list()
	{
		     $sql1="SELECT 
			 c.id 'id',
			 c.name 'name',
		  c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		  f.name 'state_name',
		  g.title 'property_type_name'
		  FROM 
		   ten_propert_list c ,
		   countries d,
		   cities e,
		   states f,
		   ten_property_type g
		   where 
		  c.country=d.id 
		  and c.state=f.id 
		  and c.city=e.id
		  and g.id=c.property_type";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	} 
	/* public function get_property_details($property_id)
	{
		  $sql1="SELECT * FROM  `ten_propert_list` where id=".$property_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	} */ 
	public function get_property_details($property_id)
	{
		/* $sql1="SELECT * FROM  `ten_propert_list` where id=".$property_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result(); */ 
		 $sql1="SELECT 
		  c.name 'name',
		  c.address 'address',
          c.zip,
		  c.created_at,
		  d.name 'country',
		  e.name 'city',
		  f.name 'state',
		  g.title 'property_type'
		  FROM 
		   ten_propert_list c ,
		   countries d,
		   cities e,
		   states f,
		   ten_property_type g
		   where 
		  c.country=d.id 
		  and c.state=f.id 
		  and c.city=e.id
		  and g.id=c.property_type
		  and c.id=".$property_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result(); 
	}
	public function view_property_details($property_id)
	{
		 $sql1="SELECT 
		  c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		  f.name 'state_name',
		  g.title 'property_type_name'
		  FROM 
		   ten_propert_list c ,
		   countries d,
		   cities e,
		   states f,
		   ten_property_type g
		   where 
		  c.country=d.id 
		  and c.state=f.id 
		  and c.city=e.id
		  and g.id=c.property_type
		  and c.id=".$property_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function edit_property_details($id)
	{
		     $sql1="SELECT 	* FROM  `ten_propert_list` where id=".$id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function property_list_delete($id)
	{
		  $sql1="delete FROM  `ten_propert_list` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
}