<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homebuyers</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/others.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

 <!--Navbar-->
 <nav id="navbar" class="bg-change">
    <h1 class="logo"><a href="#"><span class="font"><i class="fas fa-home"></i></span>Homebuyers</a></h1>

        <ul>
            <li><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li><a href="<?php echo URLROOT.'buy';?>">Buy</a></li>
            <li><a href="<?php echo URLROOT.'sell';?>">Sell</a></li>
            <li><a href="<?php echo URLROOT.'agent';?>">Agent</a></li>
        </ul>
           
        <ul>
            <?php if(isset($_SESSION['user_id'])) : ?>
             <li><a href="<?php echo URLROOT.'profiles'; ?>">profile</a></li>
             <li><a href="<?php echo URLROOT.'users/logout'; ?>">Logout</a></li>
            
            <?php else : ?>
             <li><a href="<?php echo URLROOT.'users/login'; ?>">Login</a></li>
             <li><a href="<?php echo URLROOT.'users/register'; ?>">Signup</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="register-spacing"></div>

   
        <div class="container">
            <form action="<?php echo URLROOT;?>profiles/upload" method="post" enctype="multipart/form-data">
                <h1>Select image to upload:</h1>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload Image" name="submit">
         </form>
    </div>
   

