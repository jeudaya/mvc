<?php
class customException extends Exception
{
	public function __construct($error){
		$this->error = $error;
	}
	
	public function errorMessage() {
		
		$errorMsg = $this->getTraceAsString();
		//$inspire = new INSPIRE;
                //$inspire->LoadSite();
		//echo $errorMsg;
		
		
	}
	
}
