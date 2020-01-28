<?php

    class User {
        private $db;

        public function __construct(){
            //initialize database with PDO class we created 
            $this->db = new Database;
        }

        //find user by email to check if user already used email address
        //this function is used in the controller users.php
        public function findUserByEmail($email){
            //calling our query in database.php
            $this->db->query('SELECT * FROM users WHERE email = :email');
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
    }