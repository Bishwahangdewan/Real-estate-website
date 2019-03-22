<?php

class House{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    //get house data
    public function getHouseData($id){
        $this->db->query("SELECT * FROM houses WHERE id = :id");
        $this->db->bind(":id",$id);

        $house = $this->db->single();

        if($this->db->rowCount() > 0){
            return $house;
        }else{
            return false;
        }
    }

    public function getHouseImages($id){
        $this->db->query("SELECT * FROM houseimg WHERE img_house_id = :id");
        $this->db->bind(":id",$id);

        $img = $this->db->single();

        return $img;
    }
}