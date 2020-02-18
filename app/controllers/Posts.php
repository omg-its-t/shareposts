<?php

class Posts extends Controller{

    //verify the user is logged in to see posts
    //isLoggedIn() is in the session_helper file
    public function __construct(){  
        if(!isLoggedIn()){
            redirect('users/login');
        }
    }   

    public function index(){
        
        $data = [];
        
        //load a view
        $this->view('posts/index', $data);
    }
}