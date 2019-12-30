<?php
    class Users extends Controller{
        public function __construct(){

        }

        //will load form
        //will handle post request submit for new user    
        public function register(){
            //check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form

                //sanitize POST data from user input
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => '',
                ];

                //validation
                if(empty($data['name'])){
                    $data['name_error'] = 'Please enter your name.';
                }
                if(empty($data['email'])){
                    $data['email_error'] = 'Please enter a valid email address.';
                }
                if(empty($data['password'])){
                    $data['password_error'] = 'Password enter a password.';
                }
                else{
                    if(strlen($data['password']) < 6){
                        $data['password_error'] = 'Password must be greater than 6 characters.';
                    }
                }
                if(empty($data['confirm_password'])){
                    $data['confirm_password_error'] = 'Please confirm your password.';
                }
                else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_error'] = 'Passwords do not match.';
                    }
                }

        
            //make sure errors are empty
            if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])){
                die('SUCCESS');
            } else{
                //load view with errors
                $this->view('users/register', $data);
            } 
            
            
            
        }else{
                //load form setting empty array incase of error, user input will be saved.
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => '',
                ];

                //load view 
                $this->view('users/register', $data);
            }
        
    }

        public function login(){
            //check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form
                //sanitize POST data from user input
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => '',
                ];

                if(empty($data['email'])){
                    $data['email_error'] = 'Please enter a valid email address.';
                }
                if(empty($data['password'])){
                    $data['password_error'] = 'Please confirm your password.';
                }

                //make sure errors are empty
                if(empty($data['email_error']) && empty($data['password_error'])){
                    die('SUCCESS');
                } else{
                    //load view with errors
                    $this->view('users/login', $data);
                } 


            } else{
                //load form setting empty array incase of error, user input will be saved.
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',

                ];

                //load view 
                $this->view('users/login', $data);
            }
        }
    }