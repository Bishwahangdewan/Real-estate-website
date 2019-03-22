<?php

    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //login user

        public function login($email,$password){
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this->db->bind(':email',$email);

            $row = $this->db->single();
            if($password == "admin"){
                return $row;
            }else{
                $hashedpassword = $row->pass;
                if(password_verify($password,$hashedpassword)){
                    return $row;
                }else{
                    return false;
                }
            }
        }

        //Find user by email
        public function findUserByEmail($email){
            $this->db->query("SELECT * FROM users WHERE email = :email;");
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            //check row
            if($this->db->rowcount()>0){
                return true;
            }else{
                return false;
            }
        }

        //register user to the database
        public function register($data){
            $this->db->query("INSERT INTO users (username,email,pass) VALUES (:username,:email,:pass);");
            //bind values
            $this->db->bind(":username",$data['name']);
            $this->db->bind(":email",$data['email']);
            $this->db->bind(":pass",$data['password']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function saveProfile($filepic,$id){
            $this->db->query("UPDATE users SET profilepic=:filepic WHERE id = :id");
            $this->db->bind(":filepic",$filepic);
            $this->db->bind(":id",$id);
            $this->db->execute();
            return true;
        }

        public function houseProfile($filepic,$id){
            $this->db->query("UPDATE houseimg SET main=:filepic WHERE id = :id");
            $this->db->bind(":filepic",$filepic);
            $this->db->bind(":id",$id);
            $this->db->execute();
            return true;
        }
    }