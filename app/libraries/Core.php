<?php
/**
 * app core class
 * creates URL and loads core controller
 * URL FORMAT - /controller/method/params
 */

 class Core{
     //if we just go to /trapmvc this controller will load
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    //putting params in array
    protected $params = [];

    //this grabs whatever is in the url and runs when object is instantiated 
    //(in the inxex file a core object is created)
    public function __construct(){
        //print_r($this->getUrl());
        $url = $this->getUrl();

        //look in controllers for first value (path defined as if we are in index.php
        //because we set our htaccess fiels to run though index)
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //if it exists then set as controller and do that stuff inside
            $this->currentController = ucwords($url[0]);
            //unset 0 index
            unset($url[0]);
        }

        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //instantiate controller class we just found above
        $this->currentController = new $this->currentController;

        //check for second part of url
        if(isset($url[1])){
            //check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                //unset 1 index
                unset($url[1]);
            }
        }

        //get params (starts as empty array, if none it will remain empty
        $this->params = $url ? array_values($url) : [];
        //call callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

     }

    public function getUrl(){
        //if present strip ending /, sanitize, and explode into array
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
            
     }
 }