<?php

    class Hom{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function gethomes(){
            $this->db->query("SELECT * FROM `houses` ORDER BY created_at DESC LIMIT 6");

            $houses = $this->db->resultSet();
            
            return $houses;
        }

        //search engine
        public function getSearchedItem($item){
           $name = "%$item%";
           $this->db->query('SELECT * FROM houses WHERE houselocation LIKE :house');
           $this->db->bind(':house', $name);
           $searched_data=$this->db->resultSet();

            return $searched_data;
        }

        //search for sale
        public function getBuy($item){
            $name = "%$item%";
            $this->db->query('SELECT * FROM houses WHERE houselocation LIKE :house AND bs =:sale');
            $this->db->bind(':house', $name);
            $this->db->bind(':sale','Sale');
            $searched_data=$this->db->resultSet();
 
             return $searched_data;
         }


         public function getRent($item){
            $name = "%$item%";
            $this->db->query('SELECT * FROM houses WHERE houselocation LIKE :house AND bs =:rent');
            $this->db->bind(':house', $name);
            $this->db->bind(':rent','Rent');
            $searched_data=$this->db->resultSet();
 
             return $searched_data;
         }
    }