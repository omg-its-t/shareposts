<?php

class Pages extends Controller{
    public function __construct(){
        
    }

    public function index(){

        if(isLoggedIn()){
            redirect('posts');
        }

        //this is the method inside controller.php we are calling
        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the HotBoi TrapMVC Framework.',
        ];
        
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About us',
            'description' => 'App to share posts with others on the Trap Network.',
        ];
        
        $this->view('pages/about', $data);
    }
}