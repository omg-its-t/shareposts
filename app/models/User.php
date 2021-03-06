<?php

    class User {
        private $db;

        public function __construct(){
            //initialize database with PDO class we created 
            $this->db = new Database;
        }

        //register user
        public function register($data){
            //prepare query to insert
            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            //bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            //execute statement with execute() from database.php
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //log in user
        public function login($email, $password){
            //create query
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            //get hashed password from query
            $hashed_password = $row->password;

            //check password
            if(password_verify($password, $hashed_password)){
                return $row;
            }
            else{
                return false;
            }
        }

        //find user by email to check if user already used email address
        //this function is used in the controller users.php
        public function findUserByEmail($email){
            //calling our query in database.php
            $this->db->query('SELECT * FROM users WHERE email = :email');
            //bind values
            $this->db->bind(':email', $email);

            //calling single method we created in database.php
            $row = $this->db->single();

            //check to see if row is populated
            if($this->db->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function getUserById($id){
            //calling our query in database.php
            $this->db->query('SELECT * FROM users WHERE id = :id');
            //bind values
            $this->db->bind(':id', $id);

            //calling single method we created in database.php
            $row = $this->db->single();

            //return user
            return $row;

        }
    }