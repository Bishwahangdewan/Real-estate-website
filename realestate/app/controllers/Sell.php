<?php

class Sell extends Controller{

    public function __construct(){
       
    }

    public function index(){
        $data=[
            'title' =>'sell'
        ];
        $this->views('sell',$data);
    }

}