<?php
   
    class Users extends Controller{

        public function __construct(){
            //call the user model
            $this->userModel = $this->model('User');
        }

        public function index(){
            
        }
        

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //proceed to register
               
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    "name" => trim($_POST['name']),
                    "email" => trim($_POST['email']),
                    "password" => trim($_POST['password']),
                    "confirm_password" =>trim($_POST['confirm_password']),
                    "name_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_password_err" => ""
                ];

                //check for errors
                if(empty($data['email'])){
                    $data['email_err'] = "Please Enter email";
                }else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email is already taken";
                    }
                }

                if(empty($data['name'])){
                    $data['name_err'] = "Please Enter Name";
                }

                if(empty($data['password'])){
                    $data['password_err'] = "Please enter Password";
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be at least 6 characters";
                }  

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = "Please confirm Password";
                }elseif($data['confirm_password'] != $data['password']){
                    $data['confirm_password_err'] = "Passwords do not match";
                }  

                //Make sure the error fields are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Register in the database
                    
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //register user
                    if($this->userModel->register($data)){
                      header('location:'.URLROOT.'users/login');
                    }else{
                        //err
                        die("Something went wrong");
                    }
                }else{
                    //load view with errors
                    $this->views('users/register',$data);
                }

                }else{
                //load view
                $data = [
                    "name" => "",
                    "email" => "",
                    "password" => "",
                    "confirm_password" => "",
                    "name_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_password_err" => ""
                ];

                $this->views('users/register',$data);
            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //proceed to login

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    "email" => trim($_POST['email']),
                    "password" => trim($_POST['password']),
                    "email_err" => "",
                    "password_err" => "",
                ];

                //check for errors
                if(empty($data['email'])){
                    $data['email_err'] = "Please Enter email";
                }

                if(empty($data['password'])){
                    $data['password_err'] = "Please enter Password";
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be at least 6 characters";
                }  

                //check for user
                if($this->userModel->findUserByEmail($data['email'])){
                    //email found
                    //check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'],$data['password']);

                    if($loggedInUser){
                        //create session
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['password_err'] = "password incorrect";
                        $this->views('users/login',$data);
                    }

                }else{
                    $data['email_err'] = "User not found"; 
                }

               
                //Make sure the error fields are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //Registration success
                    die('success');
                }else{
                    //load view with errors
                    $this->views('users/login',$data);
                }
            }else{
                //load view
                $data = [
                    "email" => "",
                    "password" => "",
                    "email_err" => "",
                    "password_err" => "",
                ];

                $this->views('users/login',$data);
            }
        }


        //create session of the user once logged in
        public function createUserSession($userdata){
                $name = $userdata->username;
                $password =$userdata->pass;
                if($name == "admin" && $password == "admin"){
                     $_SESSION['user_id'] = $userdata->id;
                     $_SESSION['user_name'] = $userdata->username;
                     $_SESSION['user_email'] = $userdata->email;  
                     header('location:'.URLROOT.'admins/admin');
                }else{
                     $_SESSION['user_id'] = $userdata->id;
                     $_SESSION['user_name'] = $userdata->username;
                     $_SESSION['user_email'] = $userdata->email;
                     header('location:'.URLROOT);
                }
        }

        //destroy session once logged out
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            session_destroy();
            header('location:'.URLROOT.'users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }else{
                return false;
            }
        }
    }