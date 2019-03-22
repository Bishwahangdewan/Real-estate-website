<?php

    class Core{

        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->geturl();
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //set as current controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }

            //require the controller
            require_once '../app/controllers/'.$this->currentController.'.php';

            //instantiate controller class
            $this->currentController = new $this->currentController;


            //check for the second part of the url
            if(isset($url[1])){
                //check if it is present in the controller
                if(method_exists($this->currentController,$url[1])){
                    $this->currentMethod = $url[1];
                    //unset index1
                    unset($url[1]);
                }
            }

            //get params
            $this->params = $url ? array_values($url):[];
            //callback with an array of params
            call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
            
        }

        public function geturl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
            
        }
    }

?>