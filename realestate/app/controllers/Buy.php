<?php

class Buy extends Controller{

    public function __construct(){
       
    }

    public function index(){
        $data=[
            'title' =>'buy'
        ];
        $this->views('buy',$data);
    }

    

}