<?php
/*
    Description : Model for Security
    Author      : samiran
    Date        : 28/10/2016
*/
class Security_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
	public function post_global_notification($subject,$message)
	{
		
		             $sql1="select device_token ,id from  `tent_userdata` where status=1 and user_type!=16 ";
		             $query1= $this->db->query($sql1);
		             $query_res1=$query1->result();
					 //print_r($query_res1);
					 foreach($query_res1 as $val)
					 {
						  $regId=$val->device_token;
						  $id=$val->id;
					$registrationIds = array($regId); 
					//$registrationIds =$regId; 
					
					/* $msg = array( 'message' => $message, 'title' => 'TanentApp', 'tickerText' => $message, 'vibrate' => 1, 'sound' => 1, ); */
                    $msg = array( 'message' => $message, 'title' => $subject, 'tickerText' =>'');

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
					$sql_notification="insert into  `ten_notification` set user_id=".$id.",title='".$subject."',message='".$message."',status=".$success.",type='globalnotification', multicast_id=".$multicast_id;
		            $query_notify= $this->db->query($sql_notification);
	                 }
					 return 1;
		            
	}
     
	public function global_notification_list()
	{
		$sql1="select * from ten_notification where type='globalnotification' order by id desc "; 
		 $query1= $this->db->query($sql1);
	     return $query_res1=$query1->result();
	}
	
}