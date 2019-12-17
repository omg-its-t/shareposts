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
            } else{
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