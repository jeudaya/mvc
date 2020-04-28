<?php

class Base extends INSPIRE {

    public $controller;
    public $action;
    public $postdata;
    public $title;
    public $navigation;
    public $db;
    public $languages;
    public $vehicle_class;
    public $body_types;
    public $devices;
    public $apps;
    public $getdata;
    public $content_admin_allowed_controllers = array('login', 'brandFactCategory', 'question', 'brandFact', 'dealer', 'user', 'quiz');
    public $content_admin_allowed_actions = array('myProfile');
    private $httpVersion = "HTTP/1.1";

    function init() {
        $this->SessionStart();
        $this->ProcessUrl();
        $this->set_get_data($_GET);
        $this->db = $this->db();
         /*echo '<pre>';
         print_r($this->UrlArray);
        exit;*/

        if ($this->UrlArray[0] == 'svc' || $this->UrlArray[0] == 'qa_svc') {

            if ($this->UrlArray[1] != '') {
                $this->controller = $this->UrlArray[1];
            } else {
                $this->controller = 'questions';
            }

            if ($this->UrlArray[2] == '') {
                $this->action = 'index';
            } else {
                $this->action = $this->UrlArray[2];
            }
        } else {

            $this->create_template_dir();

            if ($this->UrlArray[0] != '') {
                $this->controller = $this->UrlArray[0];
            } else {

                $this->controller = 'home';
            }
            if ($this->UrlArray[1] != '') {
                $this->action = $this->UrlArray[1];
            } else {

                $this->action = 'index';
            }
            //echo $this->controller;
           

            $this->LoadSite();
        }


        $params = $this->process();



        $message = $this->get_session_message();
        $error = $this->get_session_error();
        //var_dump($this->UrlArray[0]); 
        if($this->UrlArray[0] == 'svc'){
            //echo "matching";
        }
        else if($this->UrlArray[0] == 'qa_svc'){
            
        }
        else{
            $this->smarty->assign('MESSAGES', $message);
            $this->smarty->assign('ERROR', $error);

            $this->smarty->assign('CONTROLLER', $this->controller);
            $this->smarty->display('layouts/index.tpl');
        }
    }

    function create_template_dir() {
        if (!is_dir('app/theme/templates_c'))
            mkdir('app/theme/templates_c', 0777);
    }

    function process() {

        $class = $this->controller;
        if (class_exists($class)) {
            $obj = new $this->controller;
        } else {
            header('Location: ' . SITE_URL . 'svc');
            exit;
        }
        if (!class_exists($this->controller)) {
            $this->controller = 'errors';
        }

        $obj->postdata = $this->postdata;
        $obj->smarty = $this->smarty;
        $obj->db = $this->db;
        $obj->UrlArray = $this->UrlArray;

        if (method_exists($obj, $this->action)) {
            $obj->{$this->action}();
        } else {
            $obj->svc_not_found();
        }
        return $obj;
    }

    public function br2nl($string) {
        return str_replace(array("\r\n", "\r", "\n"), "\\n", $string);
    }

    public function load_model($modelname) {

        spl_autoload_register(function ($class) {
            require_once DIR_MODEL . $class . '.php';
        });

        return new $modelname;
    }

    public function load_svc_model($modelname) {

        spl_autoload_register(function ($class) {
            require_once DIR_SVC_MODEL . $class . '.php';
        });

        return new $modelname;
    }

    public function sanitized_qsa() {
        $qsa = strpos($this->UrlArray[1], '?');
        if ($qsa === false) {
            return $this->UrlArray[1];
        } else {
            $qsa = substr($this->UrlArray[1], 0, $qsa);
            return $qsa;
        }
    }

    public function set_get_data($g) {
        $this->getdata = $g;
    }

    public function checkUserSession() {
        if (!isset($_SESSION['userinfo']['UID'])) {
            return false;
        } else {
            return true;
        }
    }

    public function set_session_message($message) {
        if ($message != '') {
            $_SESSION['Message'] = $message;
        }
    }

    public function get_session_message() {
        if (isset($_SESSION['Message'])) {
            $message = $_SESSION['Message'];
            unset($_SESSION['Message']);
            return $message;
        }
    }

    public function set_session_error($error) {
        if ($error != '') {
            $_SESSION['Error'] = $error;
        }
    }

    public function get_session_error() {
        if (isset($_SESSION['Error'])) {
            $error = $_SESSION['Error'];
            unset($_SESSION['Error']);
            return $error;
        }
    }

    public function svc_not_found() {
        echo "Not Found";
        exit;
    }

    public function setHttpHeaders($contentType, $statusCode) {

        $statusMessage = $this->getHttpStatusMessage($statusCode);

        header($this->httpVersion . " " . $statusCode . " " . $statusMessage);
        header("Content-Type:" . $contentType);
    }

    public function getHttpStatusMessage($statusCode) {
        $httpStatus = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => 'Email already exists',
            419 => 'Results are not avialble',
            420 => 'Email Id is already been used',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');
        return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $httpStatus[500];
    }

    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        echo $jsonResponse;
        exit;
    }


}

?>
