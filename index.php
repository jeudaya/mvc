<?php
ini_set("display_error", 0);
date_default_timezone_set('America/Nassau');

include_once('app/conf/conf.cms.php');
include_once('app/conf/db.php');


//Require Template Engine
require_once(DIR_SMARTY . 'libs/Smarty.class.php');



//Include Engine
include_once(DIR_BASE . 'engine.php');
include_once(DIR_BASE . 'base.php');
include_once(DIR_BASE . 'model.php');
include_once(DIR_BASE . 'customException.php');

//Only Include Services when all other content is not required.
if (strpos($_SERVER['REQUEST_URI'], '/svc') !== false) {

    include_once(DIR_BASE . 'svc.php');

    foreach (glob("app/controller/svc/*.php") as $filename) {
        include_once $filename;
    }
} else if (strpos($_SERVER['REQUEST_URI'], 'qa_svc') !== false) {
    include_once(DIR_BASE . 'qa_svc.php');
    foreach (glob("app/controller/qa_svc/*.php") as $filename) {
        include_once $filename;
    }
} else {
    foreach (glob("app/controller/*.php") as $filename) {
        include_once $filename;
    }
}





$inspire = new Base;
$inspire->postdata = $_POST;

$inspire->init();
?>
