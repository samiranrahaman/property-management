<?php
/*
    Description : Model for Visitorsmanage
    Author      : samiran
    Date        : 28/10/2016
*/
class Visitorsmanage_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	public function post_visitor_request($firstname,$lastname,$perpuse,$phone1,$requested_user_id,$datetime)
	{
		$data = array(
		 'firstname' =>$firstname,
		 'lastname' =>$lastname,
		 'phoneno' =>$phone1,
		 'perpuse'=>$perpuse,
		'status' =>0,
		'requested_user_id'=>$requested_user_id,
		'datetime'=>$datetime,
			
		);

		$this->db->insert('ten_visitors_request', $data);
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
	public function post_add_user($firstname,$lastname,$phone1,$user_type,$admin_id,$datetime)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'phoneno' =>$phone1,
		    'type' =>$user_type,
			'status' =>0,
			'create_user_id'=>$admin_id,
			'creator_type'=>'admin',
			'datetime'=>$datetime,
			
			
		);

		$this->db->insert('ten_permanent_visitors', $data);
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
	public function post_add_visitor_api($firstname,$lastname,$phone1,$address,$user_type,$user_id)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'phoneno' =>$phone1,
		    'type' =>$user_type,
			'address' =>$address,
			'status' =>0,
			'create_user_id'=>$user_id,
			'creator_type'=>'user',
			
		);

		$this->db->insert('ten_permanent_visitors', $data);
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
	
	/* public function update_add_user($firstname,$lastname,$dob,$phone1,$email,$user_type,$property_name,$user_id)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'dob' =>$dob,
		    'phone1' =>$phone1,
			'email' =>$email,
			'user_type' =>$user_type,
			'property_id' =>$property_name,
		);
        $this->db->where('id',$user_id);
		$this->db->update('tent_userdata', $data);
		return 1;
		
		
	} */
	public function update_add_visitor_api($firstname,$lastname,$phone1,$address,$user_type,$visitor_id)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'phoneno' =>$phone1,
		   'address' =>$address,
		    'type' =>$user_type,
			
		);
        $this->db->where('id',$visitor_id);
		$this->db->update('ten_permanent_visitors', $data);
		return 1;
		
		
	}
	public function get_visitors_list()
	{
			$sql1="select 
			a.id 'staff_id',
			b.id 'ten_id',
			a.firstname 'staff_firstname',
			a.lastname 'staff_lastname',
			a.phoneno 'staff_phoneno',
			a.address 'staff_address',
			a.type 'staff_type',
			a.created_at 'staff_created_at',
			a.status 'staff_status',
			a.check_in_time  'staff_check_in_time',
			a.check_out_time  'staff_check_out_time',
			a.active_statff_id,
			b.firstname 'ten_firstname',
			b.lastname 'ten_lastname',
			b.phone1 'ten_phone1',
			b.email  'ten_email',
			b.device_token 'ten_device_token',
			c.name 'ten_propertyname',
			c.address 'ten_propertyaddress'
			from ten_permanent_visitors a
			inner join 
			tent_userdata b
			on a.create_user_id=b.id
			inner join 
			ten_propert_list c
			on b.property_id=c.id
			
			order by a.id desc ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function domestic_staff_list_api($user_id)
	{
			$sql1="select * from ten_permanent_visitors where create_user_id=".$user_id." order by id desc"; 
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function visitor_request_list()
	{
			$sql1="select 
			a.id 'vis_id',
			b.id 'ten_id',
			a.firstname 'vis_firstname',
			a.lastname 'vis_lastname',
			a.phoneno 'vis_phoneno',
			a.perpuse 'vis_perpuse',
			a.created_at 'vis_created_at',
			DATE(a.datetime) 'vis_visitdate',
			TIME(a.datetime) 'vis_visittime',
			a.status 'vis_status',
			a.check_in_time  'vis_check_in_time',
			a.check_out_time  'vis_check_out_time',
			b.firstname 'ten_firstname',
			b.lastname 'ten_lastname',
			b.phone1 'ten_phone1',
			b.email  'ten_email',
			b.device_token 'ten_device_token',
			c.name 'ten_propertyname',
			c.address 'ten_propertyaddress'
			from ten_visitors_request a
			inner join 
			tent_userdata b
			on a.requested_user_id=b.id
			inner join 
			ten_propert_list c
			on b.property_id=c.id
			
			order by a.id desc "; 
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function ten_visitor_request_list($user_id)
	{
			$sql1="select 
			a.id 'vis_id',
			b.id 'ten_id',
			a.firstname 'vis_firstname',
			a.lastname 'vis_lastname',
			a.phoneno 'vis_phoneno',
			a.perpuse 'vis_perpuse',
			a.created_at 'vis_created_at',
			DATE(a.datetime) 'vis_visitdate',
			TIME(a.datetime) 'vis_visittime',
			a.status 'vis_status',
			a.check_in_time  'vis_check_in_time',
			a.check_out_time  'vis_check_out_time',
			b.firstname 'ten_firstname',
			b.lastname 'ten_lastname',
			b.phone1 'ten_phone1',
			b.email  'ten_email',
			b.device_token 'ten_device_token',
			c.name 'ten_propertyname',
			c.address 'ten_propertyaddress'
			from ten_visitors_request a
			inner join 
			tent_userdata b
			on a.requested_user_id=b.id
			inner join 
			ten_propert_list c
			on b.property_id=c.id
			where a.requested_user_id=".$user_id."
			order by a.id desc "; 
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	
	public function visitor_delete($id)
	{
		  $sql1="delete FROM  `ten_permanent_visitors` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function edit_visitor_details($id)
	{
		     $sql1="SELECT 	* FROM  `ten_permanent_visitors` where id=".$id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function update_visitor_user($firstname,$lastname,$phone1,$user_type,$visitor_id,$datetime)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'phoneno' =>$phone1,
			'type' =>$user_type,
			'datetime'=>$datetime,
		);
		//print_r($data);
        $this->db->where('id',$visitor_id);
		$this->db->update('ten_permanent_visitors', $data);
		//exit;
		return 1;
		
		
	}
	public function visitor_check_in_time($id,$requested_user_id)
	{
		 $sql1="SELECT device_token FROM  `tent_userdata` where id=".$requested_user_id;
		 $query1= $this->db->query($sql1);
		 $device_token=$query1->row()->device_token;
		 
		 $sql1="SELECT * FROM  `ten_visitors_request` where id=".$id;
		 $query1= $this->db->query($sql1);
		 $firstname=$query1->row()->firstname;
		  $lastname=$query1->row()->lastname;
		 
					$regId=$device_token;
					$subject='Visitor Checked In';
					//$message="Security Notification for vistor CheckIn";
					$message="Visitor ".$firstname." ".$lastname." Checked In";
					$registrationIds = array($regId); 
					//$registrationIds =$regId; 
					
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => $subject, 'tickerText' =>'');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					
					$fields = json_encode($fields);
					$arrContextOptions=array(
						"http" => array(
							"method" => "POST",
							"header" =>
								'Authorization: key = AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX'. "\r\n" .
								'Content-Type: application/json'. "\r\n",
							"content" => $fields,
						),
						"ssl"=>array(
							"allow_self_signed"=>true,
							"verify_peer"=>false,
						),
					);
					$arrContextOptions = stream_context_create($arrContextOptions);
					$result = file_get_contents('https://android.googleapis.com/gcm/send', false, $arrContextOptions);

					//echo $result;
		
		           $response=json_decode($result);
					 $multicast_id=$response->multicast_id;
					 $success=$response->success;
					//print_r($response);
					$sql_notification="insert into  `ten_notification` set user_id=".$requested_user_id.",title='".$subject."',message='".$message."',status=".$success.",type='notification', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
		 
		 $data = array(
		 'check_in_time' =>date('Y-m-d h:m:s'),
		 'status' =>1,
		);
		//print_r($data);
        $this->db->where('id',$id);
		$this->db->update('ten_visitors_request', $data);
		//exit;
		return 1;
		
		
	}
	public function visitor_check_out_time($id,$requested_user_id)
	{
		 $sql1="SELECT device_token FROM  `tent_userdata` where id=".$requested_user_id;
		 $query1= $this->db->query($sql1);
		 $device_token=$query1->row()->device_token;
		 
		 $sql1="SELECT * FROM  `ten_visitors_request` where id=".$id;
		 $query1= $this->db->query($sql1);
		 $firstname=$query1->row()->firstname;
		  $lastname=$query1->row()->lastname;
		 
					$regId=$device_token;
					$subject='Visitor Checked Out';
					//$message="Security Notification for vistor CheckOut";
					$message="Visitor ".$firstname." ".$lastname." Checked Out";
					$registrationIds = array($regId); 
					//$registrationIds =$regId; 
					
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => $subject, 'tickerText' =>'');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					
					$fields = json_encode($fields);
					$arrContextOptions=array(
						"http" => array(
							"method" => "POST",
							"header" =>
								'Authorization: key = AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX'. "\r\n" .
								'Content-Type: application/json'. "\r\n",
							"content" => $fields,
						),
						"ssl"=>array(
							"allow_self_signed"=>true,
							"verify_peer"=>false,
						),
					);
					$arrContextOptions = stream_context_create($arrContextOptions);
					$result = file_get_contents('https://android.googleapis.com/gcm/send', false, $arrContextOptions);

					//echo $result;
		
		           $response=json_decode($result);
					 $multicast_id=$response->multicast_id;
					 $success=$response->success;
					//print_r($response);
					$sql_notification="insert into  `ten_notification` set user_id=".$requested_user_id.",title='".$subject."',message='".$message."',status=".$success.",type='notification', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
		 
		 $data = array(
		 'check_out_time' =>date('Y-m-d h:m:s'),
		  'status' =>2,
		);
		//print_r($data);
        $this->db->where('id',$id);
		$this->db->update('ten_visitors_request', $data);
		//exit;
		return 1;
		
		
	}
	public function domestic_staff_check_in_time($domestic_staff_id,$created_user_id)
	{
		  $sql1="SELECT device_token FROM  `tent_userdata` where id=".$created_user_id;
		 $query1= $this->db->query($sql1);
		 $device_token=$query1->row()->device_token;
		 
		 $sql1="SELECT * FROM  `ten_permanent_visitors` where id=".$domestic_staff_id;
		 $query1= $this->db->query($sql1);
		 $firstname=$query1->row()->firstname;
		  $lastname=$query1->row()->lastname;
		 
		 
					$regId=$device_token;
					$subject='Staff Checked In'; 
					//$message="Security Notification for Staff Checked In";
					$message="D.Staff ".$firstname." ".$lastname." Checked In";
					$registrationIds = array($regId); 
					//$registrationIds =$regId; 
					
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => $subject, 'tickerText' =>'');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					
					$fields = json_encode($fields);
					$arrContextOptions=array(
						"http" => array(
							"method" => "POST",
							"header" =>
								'Authorization: key = AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX'. "\r\n" .
								'Content-Type: application/json'. "\r\n",
							"content" => $fields,
						),
						"ssl"=>array(
							"allow_self_signed"=>true,
							"verify_peer"=>false,
						),
					);
					$arrContextOptions = stream_context_create($arrContextOptions);
					$result = file_get_contents('https://android.googleapis.com/gcm/send', false, $arrContextOptions);

					//echo $result;
		
		           $response=json_decode($result);
					 $multicast_id=$response->multicast_id;
					 $success=$response->success;
					//print_r($response);
					 $sql_notification="insert into  `ten_notification` set user_id=".$created_user_id.",title='".$subject."',message='".$message."',status=".$success.",type='notification', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
					
					
					$data = array(
		      'staff_id' =>$domestic_staff_id,
		      'check_in_time' =>date('Y-m-d h:m:s'),
		      'status' =>1,
		      );

		$this->db->insert('ten_domestic_staff_history', $data);
		$id=$this->db->insert_id() ; 
		 
		 
					
		 
		 $data = array(
		 'check_in_time' =>date('Y-m-d h:m:s'),
		 'active_statff_id'=>$id,
		 'status' =>1,
		);
		//print_r($data);
        $this->db->where('id',$domestic_staff_id);
		$this->db->update('ten_permanent_visitors', $data);
		//exit;
		return 1;
		
		
	}
	
	public function domestic_staff_check_out_time($domestic_staff_id,$created_user_id,$active_statff_id)
	{
		  $sql1="SELECT device_token FROM  `tent_userdata` where id=".$created_user_id;
		 $query1= $this->db->query($sql1);
		 $device_token=$query1->row()->device_token;
		 
		  $sql1="SELECT * FROM  `ten_permanent_visitors` where id=".$domestic_staff_id;
		 $query1= $this->db->query($sql1);
		 $firstname=$query1->row()->firstname;
		  $lastname=$query1->row()->lastname;
		 
					$regId=$device_token;
					$subject='Staff Checked Out';
					//$message="Security Notification for Staff CheckOut";
					$message="D.Staff ".$firstname." ".$lastname." Checked Out";
					$registrationIds = array($regId);                 
					//$registrationIds =$regId; 
					
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => $subject, 'tickerText' =>'');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					
					$fields = json_encode($fields);
					$arrContextOptions=array(
						"http" => array(
							"method" => "POST",
							"header" =>
								'Authorization: key = AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX'. "\r\n" .
								'Content-Type: application/json'. "\r\n",
							"content" => $fields,
						),
						"ssl"=>array(
							"allow_self_signed"=>true,
							"verify_peer"=>false,
						),
					);
					$arrContextOptions = stream_context_create($arrContextOptions);
					$result = file_get_contents('https://android.googleapis.com/gcm/send', false, $arrContextOptions);

					//echo $result;
		
		           $response=json_decode($result);
					 $multicast_id=$response->multicast_id;
					 $success=$response->success;
					//print_r($response);
					 $sql_notification="insert into  `ten_notification` set user_id=".$created_user_id.",title='".$subject."',message='".$message."',status=".$success.",type='notification', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
		 
		 $data = array(
		 'check_in_time' =>'0000-00-00 00:00:00',
		 'check_out_time' =>'0000-00-00 00:00:00',
		 'active_statff_id'=>0,
		 'status' =>0,
		);
		//print_r($data);
        $this->db->where('id',$domestic_staff_id);
		$this->db->update('ten_permanent_visitors', $data);
		
		$data2 = array(
		'check_out_time' =>date('Y-m-d h:m:s'),
		'status' =>2,
		);
		//print_r($data);
        $this->db->where('id',$active_statff_id);
		$this->db->update('ten_domestic_staff_history', $data2);
		
		//exit;
		return 1;
		
		
	}
	function domestic_staff_history_api($staff_id)
	{
		$sql1="  select * from
		         ten_permanent_visitors a
                 inner join
 				 ten_domestic_staff_history b
				 on a.id=b.staff_id
				 and b.status=2
				 and a.id=".$staff_id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
}