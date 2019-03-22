<?php
    class Controller{

        //model
        public function model($model){
            //require model file
            require_once '../app/models/'.$model.'.php';

            //instantiate model
            return new $model();
        }

        //views
        public function views($view,$data = [],$data1 = [],$data2=[]){
            //require views
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
        }else{
            die('View does not exist');
        }
    }

}
?>