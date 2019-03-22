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
    <nav id="navbar">
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

    <!--Show case-->
    <header id="showcase">
        <div class="showcase-content">
            <h1 class="l-heading">Search Results</h1>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <h1 class="s-heading welcome">Welcome <?php echo $_SESSION['user_name']; ?></h1>
            <?php endif; ?>
            <form action="<?php echo URLROOT.'searchs'?>" method="POST" id="searchform" class="p-small">
                <input type="text" id="searchname" name="search" placeholder="Enter City name...">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </header>

    
     <!--Featured Listings-->
 <div id="featured" class="p-med">
        <div class="container">
           
            <h1 class="s-heading text-center">Search Results</h1>
            <p class="text-center">Here are the results based on your search</p>

             <?php if(sizeof($data) > 0): ?>
             <?php for($i=0;$i<sizeof($data);$i++): ?>
           
            <div class="search-house">
                <div class="search-house-img">
                    <img class="search-img" src="house/<?php echo $data[$i]->profile;?>.jpg">
                    <div class="badge"><?php echo $data[$i]->bs;?></div>
                </div>

                <div class="search-house-content">
                    <h1 class="s-heading text-center"><?php echo $data[$i]->housename;?>e</h1>
                    <p class="text-center"><span class="font-green"><i class="fas fa-map-marker-alt"></i><?php echo $data[$i]->houselocation;?></span></p>
                    <div>
                        <p><span class="font-green"><i class="fas fa-landmark"></i></span>Size:<?php echo $data[$i]->size;?></p>
                        <p><span class="font-green"><i class="fas fa-car"></i></span>Garage:<?php echo $data[$i]->garage;?></p>
                    </div>
                    <div>
                        <p><span class="font-green"><i class="fas fa-bed"></i></span>Bedroom:<?php echo $data[$i]->bedroom;?></p>
                        <p><span class="font-green"><i class="fas fa-shower"></i></span>Bathroom:<?php echo $data[$i]->bathroom;?></p>
                    </div>
                    <div>
                        <p><span class="font-green"><i class="fas fa-user-alt"></i></span><?php echo $data1[$i]->username;?></p>
                        <p><span class="font-green"><i class="fas fa-phone"></i></span><?php echo $data1[$i]->phone;?></p>
                    </div>

                    <div class="house-price"><a href="<?php echo URLROOT."houses?id=".$data[$i]->id;?>" class="search-btn">Price : $<?php echo $data[$i]->price; ?></a></div>
                </div>
            </div>

            <?php endfor; ?>

             <?php else: ?>

                 <h1>Sorry No Results Found</h1>

             <?php endif; ?>
          
        </div>
</div>


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

    <script src="js/app.js"></script>
    <script src="js/toggle.js"></script>
  </body>
</html>