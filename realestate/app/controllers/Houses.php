<?php

    class Houses extends Controller{

        public function __construct(){
            $this->houseModel = $this->model('House');
            $this->profileModel = $this->model('Profile');
        }

        public function index(){
            $id = $_GET['id'];
            $housedata = $this->houseModel->getHouseData($id);
            $house_owner_id = $housedata->house_owner_id;

            $ownerdata = $this->profileModel->getOwnerName($house_owner_id);
           
            $houseimg = $this->houseModel->getHouseImages($id);
         

            if($housedata){
               $this->views('houses',$housedata,$ownerdata,$houseimg);
            }else{
                echo "Error";
            }
            
        }
    }