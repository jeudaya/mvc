<?php

class INSPIRE {

    var $DirTree = 0; //url offset
    var $DirLimit = 10; //url variable limit 
    var $UpDirCounter;
    var $UrlArray;
    var $smarty;
    var $ShortCuts = array();
    var $db;
    
    function SessionStart() {
    	if(!isset($_SESSION))
        session_start();
    }

    function db() {
        require(DIR_DB . 'database.svc.php');
        return $db;
    }

    function ProcessUrl() {
        $url = str_replace(PROJECT_BASE, '', $_SERVER['REQUEST_URI']);
        $this->UrlArray = explode("/", $url);
        array_shift($this->UrlArray);
        for ($i = 0; $i < $this->DirTree; $i++) {
            array_shift($this->UrlArray);
        }

        $Counter = count($this->UrlArray);
        for ($i = 0; $i < $Counter; $i++) {
            $this->UrlArray[$i] = str_replace('.html', '', $this->UrlArray[$i]);
        }
        for ($i = 1; $i < $Counter; $i++) {
            $this->UpDirCounter.='../';
        }

        for ($i = 0; $i < $this->DirLimit; $i++) {
            if (!isset($this->UrlArray[$i]))
                $this->UrlArray[$i] = '';
            $this->UrlArray[$i] = trim($this->UrlArray[$i]);
        }
    }

    function PrepareLink($title, $ext = '.html', $step = ';') {
        $prepared_title = trim($title);
        $prepared_title = str_replace(" ", $step, $prepared_title);
        $prepared_title = ereg_replace("[^0-9a-zA-Z_,-]", "", $prepared_title);
        $prepared_title.=$ext;
        return $prepared_title;
    }

    function LoadSite() {

        $this->smarty = new Smarty;
        $this->smarty->template_dir = DIR_THEME . "templates";
        $this->smarty->config_dir = DIR_THEME . "config";
        $this->smarty->cache_dir = DIR_THEME . "cache";
        $this->smarty->compile_dir = DIR_THEME . "templates_c";
        $this->smarty->compile_check = TRUE;
        $this->smarty->allow_php_tag = true;
        $this->smarty->assign('BasePath', $this->UpDirCounter);

        // generate random letter - CACHE (remove it in final version)
        $r = rand(0, 1);
        $c = ($r == 0) ? rand(65, 90) : rand(97, 122);
        $this->smarty->assign('RandomLetter', chr($c));

        //menu atcive
        $url = str_replace("/" . PROJECT_BASE, '', $_SERVER['REQUEST_URI']);
        $this->smarty->assign('REQUEST_URI', $url);
        $this->smarty->assign('currenturl', $url);

        $this->smarty->assign("Footer", 'layouts/footer.tpl');
        $this->smarty->assign("Header", 'layouts/header.tpl');
    }

    

}

?>
