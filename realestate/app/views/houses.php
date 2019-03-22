<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homebuyers</title>
    <link rel="stylesheet" href="css/style.css">
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
             <li><a href="<?php echo URLROOT.'profiles'; ?>">Profile</a></li>
             <li><a href="<?php echo URLROOT.'users/logout'; ?>">Logout</a></li>
            
            <?php else : ?>
             <li><a href="<?php echo URLROOT.'users/login'; ?>">Login</a></li>
             <li><a href="<?php echo URLROOT.'users/register'; ?>">Signup</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="register-spacing"></div>

    <div class="back">
        <div class="back-container">
            <i class="fas fa-chevron-left"></i><a href="<?php echo URLROOT; ?>">Back to Search</a>
        </div>
    </div> 

    <div class="back-header">
        <div class="back-container">
            <div class="house-name">
                <h1 class="s-heading"><?php echo $data->housename; ?></h1>
                <p><?php echo $data->houselocation; ?></p>
                <p><span><?php echo $data->bedroom; ?> beds</span> <span><?php echo $data->bathroom; ?> baths</span> <span><?php echo $data->size; ?> sqfoot</span ><span><?php empty($data->type)?"":$data->type; ?></span><p>
            </div>
            <div class="back-house-price">
                <p>Price:</p>
                <h1 class="s-heading">$<?php echo $data->price ?></h1>
            </div>
        </div>
    </div> 


    <div class="back-img">
        <div class="back-container">
        <div class="back-house-img">
            <img src="house/<?php echo $data->profile; ?>.jpg">
        </div>
        <div class="agentreq">
            <h1 class="s-heading">Contact house Agent</h1>
            <form>
                <div class="form-group">
                    <label for="name">Name<sup>*</sup></label>
                    <input type="text" id="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone<sup>*</sup></label>
                    <input type="text" id="phone" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="email">Email<sup>*</sup></label>
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="message">Message<sup>*</sup></label>
                    <textarea type="text" id="message" class="form-control" placeholder="Enter Message"></textarea>
                </div>
                <input type="submit" class="agent-btn" value="Submit">
            </form>
        </div>
    </div> 
    </div> 


<div class="house-details">
    <div class="back-container">
        <h1 class="s-heading">Overview</h1>
        <div class="listing">
            <div>
             <p>Bed: <?php echo $data->bedroom; ?></p>
             <p>Bath <?php echo $data->bathroom; ?></p>
             <p>Built in </p>
            </div>
      
            <div>
             <p>Garage <?php echo $data->garage; ?></p>
             <p>Size <?php echo $data->size; ?></p>
             <p>Type <?php echo $data->bs; ?> </p> 
            </div>
    </div>
    </div>
</div>


<div class="house-details">
    <div class="back-container">
        <h1 class="s-heading">Description</h1>
        <p><?php echo $data->description; ?></p>
    </div>
</div>
<br>
<br>

    <footer>
        <div class="footer-content">
            <div class="about">
                <h1>Homebuyers</h1>
                <p>Maecenas eget mi laoreet, molestie nibh et, sodales augue. Ut purus nulla, interdum id justo eget, placerat consectetur velit. Etiam consectetur orci sit amet commodo fermen.</p>
                <ul>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="contact">
                <h1>Contactus</h1>
                <ul>
                    <li><span class="font"><i class="fas fa-map-marker-alt"></i></span>3711-2880 Nulla St, Mankato, Mississippi</li>
                    <li><span class="font"><i class="fas fa-phone"></i></span>(+88) 666 121 4321</li>
                    <li><span class="font"><i class="fas fa-envelope"></i></span>homebuyers@gmail.com</li>
                </ul>
            </div>

            <div class="newsletter">
                <h1>Subscribe</h1>
                <form>
                    <input type="email" class="subscribe" placeholder="Enter your email">
                    <input type="submit" class="btn" value="Submit">
                </form>
            </div>
        </div>
         <p>Copyright: &copy; 2019 Homebuyers. All Rights Reserved</p>
    </footer>

    <script src="js/toggle.js"></script>
  </body>
</html>