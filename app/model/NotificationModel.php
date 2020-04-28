<?php
class NotificationModel  extends Model
{

	public $db; 
	//database connection object

	public function __construct()
	{
		$this->db = parent::__construct();
	}
	
   /**
   *Function used to insert data in user_details table for subscription
   * @param string $smsnum,$arn
   */	
	function updateSMSdata($smsnum,$arn){

		$query = "SELECT * from `users_details` WHERE sms_number = '$smsnum' ";
	 	$result = $this->db->Query($query);
	 	$num = $this->db->FetchArray($result);

		if ($num['sms_number']) {
			$query = "UPDATE `users_details` SET sms_number = '$smsnum' , sms_frequency ='$arn'  WHERE id =  '".$num['id']."' ";
		 	$this->db->Query($query);
		}else{
			$query = "INSERT INTO users_details (`job_role`,`preferred_email`,`sms_option` ,`sms_frequency` ,`sms_number`) VALUES ('Manager','sooraj-op@allthingsmedia.com','yes','" . $arn . "','" . $smsnum . "') ";
		 	$this->db->Query($query);
		}
		
	}

	/**
   *Function used to delete data from user_details table for Unsubscription
   * @param string $smsfre
   */
	function unsubscribeSMSdata($smsfre){

		if ($smsfre) {
			$query = "DELETE FROM users_details WHERE sms_frequency = '$smsfre'";
        	$result = $this->db->Query($query);
		}

	}

	/**
   *Function used to select all the mobile numbers and arn numbers from the table
   * @return type mixed 
   */
	function smsunSubscription(){	

		$query = "SELECT * from `users_details`";
	 	$result = $this->db->Query($query);
	 	return $this->db->FetchAllArray($result);

	}
	
}