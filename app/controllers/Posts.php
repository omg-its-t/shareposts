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
        //check to see if post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //sanitize post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => '',
            ];

            //validate data
            if(empty($data['title'])){
                $data['title_error'] = 'Please enter a title.';
            }
            if(empty($data['body'])){
                $data['body_error'] = 'Please enter post body.';
            }

            //make sure no errors
            if(empty($data['title_error']) && empty($data['body_error'])){
                //addPost() from models/Post.php
                if($this->postModel->addPost($data)){
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else{
                    die('Sorry, something went wrong.');
                }
            } else {
                //load view with errors
                $this->view('posts/add', $data);
            }

        } else{
            //post will be empty
            $data = [
                'title' => '',
                'body' => '',
            ];
            //load a view
            $this->view('posts/add', $data);
        }
    }
}