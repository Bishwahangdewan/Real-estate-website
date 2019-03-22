<?php

class Home extends Controller{

    public function __construct(){
        $this->homeModel = $this->model('Hom');
        $this->userModel = $this->model('Profile');
    }
    public function index(){
        $homes=$this->homeModel->gethomes();
        $owners = [];
        foreach($homes as $home){
            $owner_id = $home->house_owner_id;
            $owner = $this->userModel->getOwnerName($owner_id);
            array_push($owners,$owner);
        }
       
        $this->views('home',$homes,$owners);
    }
        
}