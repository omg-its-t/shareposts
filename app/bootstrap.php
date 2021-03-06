<?php
//this is required by index and will require all the other files we will need

//load config
require_once 'config/config.php';
/*
*load libraries
*require_once 'libraries/Core.php';
*require_once 'libraries/Controller.php';
*require_once 'libraries/Database.php';
*/

//load helpers file
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';


//autoload core libraries instead of manually including all the files needed
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});