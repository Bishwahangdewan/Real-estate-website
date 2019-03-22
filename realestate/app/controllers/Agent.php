<?php

class Agent extends Controller{

    public function __construct(){
       
    }

    public function index(){
        $data=[
            'title' =>'agent'
        ];
        $this->views('agent',$data);
    }

}