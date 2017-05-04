<?php
/*
    Description : Model for country
    Author      : samiran
    Date        : 28/10/2016
*/
class Manageaccount_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    public function post_manageaccount_data($due_date,$paid_date,$description,$amount_due,$amount_paid,$amount_remain,$payment_type,$payment_category,$tenant_user,$property)
	{
		 $data = array(
		 'due_date' =>date('Y-m-d h:m:s', strtotime($due_date. "+1 days")),
		  'paid_date' =>date('Y-m-d h:m:s', strtotime($paid_date. "+1 days")),
		   'description' =>$description,
		    'amount_due' =>$amount_due,
			'amount_paid' =>$amount_paid,
			'amount_remain' =>$amount_remain,
			'payment_type' =>$payment_type,
			'payment_category' =>$payment_category,
			'tenant_user' =>$tenant_user,
			'property' =>$property,
		);

		$this->db->insert('ten_account_manage', $data);
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
	
	 public function update_manageaccount_data($due_date,$paid_date,$description,$amount_due,$amount_paid,$amount_remain,$payment_type,$payment_category,$tenant_user,$property,$payment_id)
	{
		 $data = array(
		 'due_date' =>date('Y-m-d h:m:s', strtotime($due_date. "+1 days")),
		  'paid_date' =>date('Y-m-d h:m:s', strtotime($paid_date. "+1 days")),
		   'description' =>$description,
		    'amount_due' =>$amount_due,
			'amount_paid' =>$amount_paid,
			'amount_remain' =>$amount_remain,
			'payment_type' =>$payment_type,
			'payment_category' =>$payment_category,
			'tenant_user' =>$tenant_user,
			'property' =>$property
		);
		
       /*  $this->db->where('id',$payment_id);
		$this->db->update('ten_account_manage', $data); */
		$this->db->where('id',$payment_id);
		$this->db->update('ten_account_manage', $data);
		return 1;
		
		
	}
	 public function post_managefund_data($paid_date,$description,$amount_paid,$payment_type,$payment_category)
	{
		 $data = array(
		   'paid_date' =>date('Y-m-d h:m:s', strtotime($paid_date. "+1 days")),
		   'description' =>$description,
		   'amount_paid' =>$amount_paid,
			
			'payment_type' =>$payment_type,
			'payment_category' =>$payment_category,
			
		);

		$this->db->insert('ten_funds_manage', $data);
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
	public function get_payment_list()
	{
		 $sql1="SELECT  
		 a.due_date,
		 a.paid_date,
		 a.description,
		 a.amount_due,
		 a.amount_paid,
		 a.amount_remain,
		 IF(  a.`payment_type` =  '1','Check','Cash' ) AS payment_type_name,
		 b.name purpose,
		 a.tenant_user,
		 a.property,
		 a.created_at
		 from 
		 ten_account_manage a 
		 inner join
		 ten_services_list b
		 on a.payment_category=b.id
		 ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function get_payment_list_api($user_id)
	{
		/*  $sql1="SELECT 
         a.due_date,
		 a.paid_date,
		 DATE(a.due_date) 'due_date',
		 TIME(a.due_date) 'due_time',
		 DATE(a.paid_date) 'paid_date',
		 TIME(a.paid_date) 'paid_time',
		 a.description,
		 a.amount_due,
		 a.amount_paid,
		 a.amount_remain,
		 IF(  a.`payment_type` =  '1','Check','Cash' ) AS payment_type_name,
		 b.name purpose,
		 a.tenant_user,
		 a.property,
		 a.created_at
		 from 
		 ten_account_manage a 
		 inner join
		 ten_services_list b
		 on a.payment_category=b.id
		 where a.tenant_user=".$user_id; */
		  $sql1="SELECT 
         a.due_date,
		 a.paid_date,
		 a.description,
		 a.amount_due,
		 a.amount_paid,
		 a.amount_remain,
		 IF(  a.`payment_type` =  '1','Cheque','Cash' ) AS payment_type_name,
		 b.name purpose,
		 a.tenant_user,
		 a.property,
		 a.created_at
		 from 
		 ten_account_manage a 
		 inner join
		 ten_services_list b
		 on a.payment_category=b.id
		 where a.tenant_user=".$user_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	
	public function get_fund_list()
	{
		 $sql1="SELECT  
		 a.paid_date,
		 a.description,
		 a.amount_paid,
		 IF(  a.`payment_type` =  '1','Check','Cash' ) AS payment_type_name,
		 b.name purpose,
		 a.created_at
		 from 
		 ten_funds_manage a 
		 inner join
		 ten_services_list b
		 on a.payment_category=b.id";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function get_fund_list_api()
	{
		 $sql1="SELECT  
		 a.paid_date,
		 a.description,
		 a.amount_paid,
		 IF(  a.`payment_type` =  '1','Check','Cash' ) AS payment_type_name,
		 b.name purpose,
		 a.created_at
		 from 
		 ten_funds_manage a 
		 inner join
		 ten_services_list b
		 on a.payment_category=b.id";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function edit_account($id)
	{
		 $sql1="SELECT * from ten_account_manage where id=".$id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function payment_list_delete($id)
	{
		  $sql1="delete from ten_account_manage where id=".$id;
		  $query1= $this->db->query($sql1);
	     return 1;
	}
	
	
	
}