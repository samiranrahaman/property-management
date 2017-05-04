<?php
/*
    Description : Model for country
    Author      : samiran
    Date        : 28/10/2016
*/
class Managecountry_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	
	public function get_country()
	{
		$sql1="select id 'value', name 'label' FROM  `countries`";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_selected_country()
	{
		$sql1="select  name FROM  `countries` where status=1";
		$query1= $this->db->query($sql1);
	   $query_res1=$query1->result();
	   $x='';
	   foreach( $query_res1 as $data)
	   {
		    $x[]=$data->name;
	   }
	   return $x;
	}
	public function allow_country($country_name)
	{
		  $sql12="update countries set status=0 where status=1";
		$query12= $this->db->query($sql12);
		$listofcountry=explode(",",$country_name);
		foreach($listofcountry AS $name)
		{
		$sql1="update countries set status=1 where name='".$name."'";
		$query1= $this->db->query($sql1);
		}
		
	   return 1;
	}
	public function get_allow_country()
	{
		$sql1="select  * FROM  `countries` where status=1";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_allow_state($country_id)
	{
		$sql1="select  * FROM  `states` where country_id=".$country_id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_allow_city($state_id)
	{
		$sql1="select  * FROM  `cities` where state_id=".$state_id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
}