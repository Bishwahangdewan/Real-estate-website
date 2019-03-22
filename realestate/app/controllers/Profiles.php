<?php
    class Profiles extends Controller{

        public function __construct(){
            $this->profileModel = $this->model('Profile');
            $this->userModel = $this->model('User');
        }

        public function index(){
               if($this->isLoggedIn()){
                $useremail = $_SESSION['user_email'];
          
                $userdata = $this->profileModel->getUserProfile($useremail);
               
                //store data
                $fname = $userdata->firstName;
                $lname = $userdata->lastname;
                $uname = $userdata->username;
                $phone = $userdata->phone;
                $email = $userdata->email;
                $profilepic = $userdata->profilepic;

                $userid = $userdata->id;
            
                
                $housedata = $this->profileModel->getUserHouse($userid);
             

                $data = [
                    'fname' => $fname,
                    'lname' => $lname,
                    'uname' => $uname,
                    'phone' => $phone,
                    'email' => $email,
                    'profilepic' =>$profilepic,
                ];
                 $this->views('users/profiles',$data,$housedata);

            }else{
               header('location:'.URLROOT.'users/login');
            }
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }else{
                return false;
            }
        }

        public function upload(){
           $this->views('users/upload');
            
            if(isset($_POST['submit'])){
                $file = $_FILES['file'];
        
                //file details
                $filename = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
        
                //allow only specific files to upload
                $fileExt = explode('.',$filename);	
                $fileActualExt = strtolower(end($fileExt));
        
                $allowed = array('jpg','jpeg','png');
        
                if(in_array($fileActualExt,$allowed)){

                    if($fileError === 0){

                        $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                        $filedestination = 'upload/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$filedestination);
                        $userid = $_SESSION['user_id'];
                        if($this->userModel->saveProfile($fileNameNew,$userid)){
                            echo "success";
                            header("location:".URLROOT.'profiles');
                        }else{
                            die("failed");
                        }

                        

                    }else{

                        echo "There was an erroor uploading your file";

                    }
                }else{

                    echo "You cannot upload this type";

                }
            }
        }



        public function houseprofileupload($id){
            if(isset($_POST['submit'])){
                $file = $_FILES['file'];
        
                //file details
                $filename = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
        
                //allow only specific files to upload
                $fileExt = explode('.',$filename);	
                $fileActualExt = strtolower(end($fileExt));
        
                $allowed = array('jpg','jpeg','png');
        
                if(in_array($fileActualExt,$allowed)){

                    if($fileError === 0){

                        $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                        $filedestination = 'house/profile/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$filedestination);
                        $userid = $id;
                        if($this->userModel->houseProfile($fileNameNew,$userid)){
                            echo "success";
                            header("location:".URLROOT.'profiles');
                        }else{
                            die("failed");
                        }

                        

                    }else{

                        echo "There was an erroor uploading your file";

                    }
                }else{

                    echo "You cannot upload this type";

                }
            }
        }
    }