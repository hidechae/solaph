<?php
require_once('/usr/share/php/smarty/libs/Smarty.class.php');
// template_directory
define('ROOT_TWITTER', '/var/www/html/twitter_api/');
define('SMARTY', ROOT_TWITTER . 'smarty/');
define('TPL', ROOT_TWITTER . 'tpl/');
class MySmarty extends Smarty
{
    function MySmarty()
    {
        $this->template_dir = SMARTY . 'templates/';
        $this->compile_dir = SMARTY . 'templates_c/';
        $this->Smarty();
    }

    function display($resource_name, $cache_id = null, $compile_id = null)
    {
        $this->fetch(TPL.$resource_name, $cache_id, $compile_id, true);
    }
}
