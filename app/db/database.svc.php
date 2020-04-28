<?php
	include_once(DIR_CONF.'conf.my_db.php');
	include_once(DIR_DB.'object.my_db.php');
	$db = new BaseClass($b_type,$Cfg_host,$Cfg_user,$Cfg_password,$Cfg_db);
?>