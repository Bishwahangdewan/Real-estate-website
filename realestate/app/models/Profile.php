<?php

    class Profile{
        private $db;

        public function __construct(){
         $this->db = new Database;   
        }


        //get user data
        public function getuserProfile($useremail){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$useremail);

            $row = $this->db->single();

            if($this->db->rowcount() > 0){
                return $row;
            }else{
                die("Something went wrong");
            }
        }

        //get house
        public function getUserHouse($id){
            $this->db->query('SELECT * FROM houses WHERE house_owner_id = :id');
            $this->db->bind(':id',$id);
            
            $houses = $this->db->resultSet();

            return $houses;
        }

        public function getOwnerName($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id',$id);
            
            $owner= $this->db->single();
            
            return $owner;
        }
    }