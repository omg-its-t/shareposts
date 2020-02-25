<?php

class Posts extends Controller{

    //verify the user is logged in to see posts
    //isLoggedIn() is in the session_helper file
    public function __construct(){  
        if(!isLoggedIn()){
            redirect('users/login');
        }

        //load model we defined in Models/Post
        $this->postModel = $this->model('Post');
    }   

    public function index(){
        //get posts 
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts,
        ];
        
        //load a view
        $this->view('posts/index', $data);
    }

    public function add(){

        //post will be empty
        $data = [
            'title' => '',
            'body' => '',
        ];

        //load a view
        $this->view('posts/add', $data);
    }
}