<?php

    class Searchs extends Controller{

        public function __construct(){
            $this->houseModel = $this->model('Hom');
            $this->userModel = $this->model('Profile');
        }

        public function index(){
           
            if(isset($_POST['submit'])){
                //search
                $search = strtolower(trim($_POST['search']));
                $houses = $this->houseModel->getSearchedItem($search);
                $owners = [];
                foreach($houses as $house){
                    $house_owner = $house->house_owner_id;
                    $owner = $this->userModel->getOwnerName($house_owner);
                    array_push($owners,$owner);
                }
                $this->views('searchs',$houses,$owners);
            }else{
                die("Something went wrong");
            }
       
      }
    }
    


    

