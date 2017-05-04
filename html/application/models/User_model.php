<?php
/*
    Description : Model for User
    Author      : samiran
    Date        : 28/10/2016
*/
class User_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	 
	public function post_user_type($title)
	{
		 $data = array(
		 'name' =>$title,
		);

		$this->db->insert('ten_user_type', $data);
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
	public function get_user_type()
	{
		 $sql1="SELECT 	* FROM  `ten_user_type` ";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
		
	}
	public function usertype_delete($id)
	{
		  $sql1="delete FROM  `ten_user_type` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function user_delete($id)
	{
		  $sql1="delete FROM  `tent_userdata` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	public function usertype_update($title,$type_id)
	{
		  $sql1="update `ten_user_type`  set name='".$title."' where id=".$type_id;
		  $query1= $this->db->query($sql1);
	      return 1;
	}
	
	public function post_add_user($firstname,$lastname,$dob,$phone1,$email,$user_type,$property_name)
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

		$this->db->insert('tent_userdata', $data);
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
	public function post_add_user_api($firstname,$lastname,$phone1,$email,$user_type,$username,$password,$device_token)
	{
		
		 $sql1="SELECT 	status FROM  `tent_userdata` where username='".$username."'";
		 $query1= $this->db->query($sql1);
		 if($query1->num_rows()>0 )
		 {
			return 0;
		 }
		 else
		 {
			  $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'phone1' =>$phone1,
			'email' =>$email,
			'user_type' =>$user_type,
			'username' =>$username,
			'password' =>md5($password),
			'device_token'=>$device_token,
		);

		$this->db->insert('tent_userdata', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		 return $id;
		 
		 }
		 
		
		
	}
	public function update_add_user($firstname,$lastname,$dob,$phone1,$email,$user_type,$property_name,$user_id)
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
		
		
	}
	public function update_user_api($firstname,$lastname,$dob,$email,$gender,$user_id)
	{
		 $data = array(
		 'firstname' =>$firstname,
		  'lastname' =>$lastname,
		   'dob' =>$dob,
		   'email' =>$email,
			'gender' =>$gender,
		);
		//print_r($data);
        $this->db->where('id',$user_id);
		$this->db->update('tent_userdata', $data);
		//exit;
		return 1;
		
		
	}
	public function add_tenant_property($property_id,$user_id)
	{
		 $data = array(
			'property_id' =>$property_id,
		);
        $this->db->where('id',$user_id);
		$this->db->update('tent_userdata', $data);
		return 1;
		
		
	}
	
	public function get_user_list()
	{
		    
			 
			/*  $sql1="SELECT a.id ,
			 concat(a.firstname, ' ' , a.lastname, ' ,' ,c.address,',',c.zip) 'tenant',
			 a.firstname,
			 a.lastname,a.dob,a.phone1,a.email,a.created_at,
			 a.status,
			 a.device_token,
		   b.name 'usertype',
		   c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		 f.name 'state_name'
		   from 
		   `tent_userdata` a
		    left join ten_user_type b
			on a.user_type=b.id 
			left join ten_propert_list c
			on a.property_id=c.id 
			left join countries d
			on c.country=d.id  
			left join cities e
			on c.state=e.id
			left join states f
			on c.city=f.id
			"; */
			$sql1="SELECT a.id ,
			 concat(a.firstname, ' ' , a.lastname) 'tenant',
			 a.firstname,
			 a.lastname,a.dob,a.phone1,a.email,a.created_at,
			 a.status,
			 a.device_token,
		   b.name 'usertype',
		   c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		 f.name 'state_name'
		   from 
		   `tent_userdata` a
		    left join ten_user_type b
			on a.user_type=b.id 
			left join ten_propert_list c
			on a.property_id=c.id 
			left join countries d
			on c.country=d.id  
			left join cities e
			on c.state=e.id
			left join states f
			on c.city=f.id
			"; 
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function get_user_details($id)
	{
		 /*  $sql1="SELECT a.firstname,a.lastname,a.dob,a.phone1,a.email,a.created_at,
		  b.name 'usertype',
		  c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		 f.name 'state_name'
		  FROM  `tent_userdata` a ,
		  ten_user_type b,
		  ten_propert_list c ,
		   countries d,
		   cities e,
		   states f
		   where 
		  a.id=".$id." 
		  and a.user_type=b.id 
		  and a.property_id=c.id 
		  and c.country=d.id 
		  and c.state=e.id 
		  and c.city=f.id 
		  "; */
		  
		  $sql1="SELECT a.id 'user_id',a.firstname,a.lastname,a.dob,a.phone1,a.email,a.created_at,
		   b.name 'usertype',
		   c.name 'property_name',
		  c.address 'property_address',
          c.zip,
		  d.name 'country_name',
		  e.name 'city_name',
		 f.name 'state_name'
		   from 
		   `tent_userdata` a
		    left join ten_user_type b
			on a.user_type=b.id 
			left join ten_propert_list c
			on a.property_id=c.id 
			left join countries d
			on c.country=d.id  
			left join cities e
			on c.state=e.id
			left join states f
			on c.city=f.id
			where 
 			a.id=".$id."
			";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function get_user_details_api($id)
	{
		 $sql1="SELECT a.id    'user_id',a.firstname,a.lastname,a.dob,a.phone1,a.email,a.username,a.gender
		   from `tent_userdata` a where  a.id=".$id."
			";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function edit_user_details($id)
	{
		     $sql1="SELECT 	* FROM  `tent_userdata` where id=".$id;
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	public function user_status($id,$device_token)
	{
		 $sql1="SELECT 	* FROM  `tent_userdata` where id=".$id;
		 $query1= $this->db->query($sql1);
		 $username=$query1->row()->username;
		 if($query1->row()->status>0)
		 {
		 $sql1="update `tent_userdata` set status=0 where id=".$id;
		 $query1= $this->db->query($sql1);
		          $regId = $device_token;
					$message = "your Account deactivated!";


					$registrationIds = array($regId); 
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
					$msg = array( 'message' => $message, 'title' => 'Account Deactivate', 'tickerText' =>'http://138.197.54.179/images/deactivation.png');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					//AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX
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
					$response=json_decode($result);
					 $multicast_id=$response->multicast_id;
					 $success=$response->success;
					//print_r($response);
					$sql_notification="insert into  `ten_notification` set user_id=".$id.",title='Account Deactivate',message='".$message."',status=".$success.",type='deactivate', multicast_id=".$multicast_id; 
		            $query_notify= $this->db->query($sql_notification);
                    return $result;
	     //return 1;
		 }
		 else
		 {
		$sql1="update `tent_userdata` set status=1 where id=".$id;
		$query1= $this->db->query($sql1);
		
		            $regId = $device_token;
					$message = "Login credintial,username:".$username."";


					$registrationIds = array($regId); 
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => 'Account Activate', 'tickerText' =>'http://138.197.54.179/images/activation.png');

					$fields = array(
						'registration_ids' => $registrationIds,
						'data' => $msg
					);
					//AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX
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
					$sql_notification="insert into  `ten_notification` set user_id=".$id.",title='Account Activate',message='".$message."',status=".$success.",type='activate', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
		
		
		
		
		 return $result;
	     //return 1;
		 }
		 
		
	}
	public function push_notification_api($device_token)
	{
		$regId = $device_token;
    $message = "Tanemt App Test Message";


    $registrationIds = array($regId); 
    $msg = array( 'message' => $message, 'title' => 'notification center', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, );

    $fields = array(
        'registration_ids' => $registrationIds,
        'data' => $msg
    );
	//AAAAblmPDFY:APA91bGvmDJfAsX6zz9rETSHEqE_0voqp7pVYiWpRR6VRqGalqQHY1lgJbx0KQYmsL_zTk1rJMYQrMvX5kTCZcPBtXmZ5h8OoSXv9fGXbMGU2TUP-WWRebEKw4DKc66P6EuhIYdAVXBX
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

    echo $result;
	}
	
	public function get_notification($user_id)
	{
		 $sql1="SELECT 	* FROM  `ten_notification` where user_id=".$user_id." order by id desc";
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
		
	}
	public function service_notify_user($request_id,$service_response_detais,$user_id,$device_token,$status)
	{
		 
		
		
		             $regId = $device_token;
					 $message = $service_response_detais;


					$registrationIds = array($regId); 
					$msg = array( 'message' => $message, 'title' => 'Services Response', 'tickerText' =>'http://138.197.54.179/images/srv.png');

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
					$sql_notification="insert into  `ten_notification` set user_id=".$user_id.",title='Services Response',message='".$message."',status=".$success.",type='service', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
		
		            $sql1="update `ten_service_request` set status=".$status." where id=".$request_id;
		            $query1= $this->db->query($sql1);
					
					 $sql1="insert into  `ten_service_request_response` set requist_id=".$request_id." ,details='".$message."',status=".$status;
		            $query1= $this->db->query($sql1);
					
					
					
					
		
		
		           return $result;
	     
		
	}
}