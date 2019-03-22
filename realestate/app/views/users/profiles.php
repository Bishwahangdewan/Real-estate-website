<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homebuyers</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/others.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="css/mobile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <!--Navbar-->
    <nav id="navbar" class="bg-change">
    <div>
    <h1 class="logo"><a href="#"><span class="font"><i class="fas fa-home"></i></span>Homebuyers</a></h1>
    <a class="icon"><i class="fas fa-bars"></i></a>
    </div>
        <ul>
            <li><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li><a href="<?php echo URLROOT.'buy';?>">Buy</a></li>
            <li><a href="<?php echo URLROOT.'sell';?>">Sell</a></li>
            <li><a href="<?php echo URLROOT.'agent';?>">Agent</a></li>
        </ul>
           
        <ul>
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li><a href="<?php echo URLROOT.'users/logout'; ?>">Logout</a></li>
        <?php else : ?>
            <li><a href="<?php echo URLROOT.'/user/login'; ?>">Login</a></li>
            <li><a href="<?php echo URLROOT.'/user/register'; ?>">Signup</a></li>
        <?php endif; ?>
        </ul>
    </nav>
    <div class="register-spacing"></div>

    <!--profile-->
    <div class="profile-cover">
        <div class="profile-picture">
            <?php if($data['profilepic'] == ""): ?>
            <a href="<?php echo URLROOT; ?>profiles/upload"><img class="profile-pic" src="upload/defaultprofile.jpg"></a>
            <?php else: ?>
            <a href="<?php echo URLROOT; ?>profiles/upload"><img class="profile-pic" src="upload/<?php echo $data['profilepic'];?>"></a>
            <?php endif; ?>
            <div class="profile-name">
               
                <h1><?php echo $data['uname']; ?></h1>
                <a href="" class="btn-profile">Edit Profile</a>
            </div>
        </div>
        <div class ="profile-info">
        <div class="content-container">
            <p class="s-heading">Name:<?php echo $data['fname'];?></p>
            <p class="s-heading">Username: <?php echo $data['uname'];?></p>
            <p class="s-heading">Email: <?php echo $data['email'];?></p>
            <p class="s-heading">Phone: <?php echo $data['phone'];?></p>
            </div>
        </div>
        <hr class="theme">

    </div>

     <!--call footer-->
     <?php require APPROOT.'/views/layout/footer1.php'; ?>
    </body>
    </html>

    