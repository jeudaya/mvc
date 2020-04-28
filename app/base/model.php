<?php

class Model extends INSPIRE {

    public $created_by; 
    public $created_date;

    public function __construct() {
        //setting up db object
       
        $this->user_by();
        $this->current_date_time();
        return $this->create_db();
    }

    //create db connection
    public function create_db() {
        require(DIR_CONF . 'conf.my_db.php');
        return $db = new BaseClass($b_type, $Cfg_host, $Cfg_user, $Cfg_password, $Cfg_db);
    }
    
    /**
     * Method to return the created by/modified  user id
     * @return int user_id
     */
    public function user_by() {
        if (isset($_SESSION['userinfo'])) {
            $this->created_by  = $_SESSION['userinfo']['UID'];
        }
    }
        
    /**
     * Method to return current date time - can be used for modified and created by
     * date time : date time 
     * 
     */
    public function current_date_time() {
        $this->created_date = date('Y-m-d H:i:s', time());
    }
    
    public function num_rows( $var )
    {
    	return mysql_num_rows( $var )  ;
    }
    
    public function hash_the_password( $word )
    {
    	return md5( $word )  ;
    }

   
    
    public function clean_for_sql_html( $var )
    {
    	return $this->clean_for_sql( $this->clean_for_html( $var ) );
    }
    
    public function clean_for_sql( $var )
    {
    	return mysql_real_escape_string( $var );
    }
    
    public function clean_for_json( $var )
    {
    	return  $var ;
    }
    
    
    public function clean_for_html( $var )
    {
    	return htmlspecialchars( $var );
    }
    
    public function clean_for_int( $var )
    {
    	return filter_var( $var, FILTER_SANITIZE_NUMBER_INT );
    }
    
    public function clean_for_1_letter( $var )
    {
    	return filter_var( $var, FILTER_SANITIZE_STRING );
    }
    public function clean_for_email( $var )
    {
    	return filter_var( $var, FILTER_SANITIZE_EMAIL );
    }
    
    public function clean_array_for_sql( $arr )
    {
    	$ret = array();
    	if( is_array( $arr ) )
    	{
    		foreach ( $arr as $key => $val )
    		{
    			$ret[$key] = $this->clean_for_sql( $val );
    		}
    	}
    	else
    		return $this->clean_for_sql( $arr );
    		return $ret;
    }
    
    function clean_array_for_html( $arr, $arr_keys = array('') )
    {
    	$ret = array();
    	if( is_array( $arr ) )
    	{
    		foreach ( $arr as $key => $val )
    		{
    			//if keylist not empty, not default, tgt array not assoc,  not in array
    			if( ($arr_keys) && $arr_keys[0] !== '' &&  !isset($arr[0]) && !in_array( $key, $arr_keys) )
    			{
    				$ret[$key] = $val;
    				continue;
    			}
    			$ret[$key] = $this->clean_for_html( $val );
    		}
    	}
    	else
    		return $this->clean_for_html( $arr );
    		return $ret;
    }
    
    
    public function clean_array_for_int( $arr )
    {
    	$ret = array();
    	if( is_array( $arr ) )
    	{
    		foreach ( $arr as $key => $val )
    		{
    			$ret[$key] = $this->clean_for_int( $val );
    		}
    	}
    	else
    		return $this->clean_for_int( $arr );
    		return $ret;
    }
}
