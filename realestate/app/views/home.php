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
            <h1 class="l-heading">Find Your Home</h1>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <h1 class="s-heading welcome">Welcome <?php echo $_SESSION['user_name']; ?></h1>
            <?php endif; ?>
             <form action="<?php echo URLROOT.'searchs'?>" method="POST" id="searchform" class="p-small">
                <input type="text" id="searchname" name="search" placeholder="Enter City name...">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </header>

    <!--Search-->
    <div id="search">
            <h1 class="s-heading">FIND YOUR PLACE WITH OUR LOCAL LIFE STYLE</h1>
           
    </div>


    <!--Featured Listings-->
    <div id="featured" class="p-med">
        <div class="container">
            <h1 class="s-heading text-center">Featured Listings</h1>
            <p class="text-center">Here are some of the houses you may like</p>
            
            <div class="houses p-med">
             <?php for($i=0;$i<3;$i++): ?>
                <div class="house">
                    <div class="house-img">
                      <img src="house/<?php echo $data[$i]->profile;?>.jpg">
                      <p class="badge"><?php echo $data[$i]->bs;?></p>
                    </div>
                    <div class="house-details">
                      <h1 class="s-heading text-center"><?php echo $data[$i]->housename;?></h1>
                        <p class="text-center"><span class="font-green"><i class="fas fa-map-marker-alt"></i></span><?php echo $data[$i]->houselocation;?></p>
                        <hr>
                        <ul>
                            <li>
                                <p><span class="font-green"><i class="fas fa-landmark"></i></span><?php echo $data[$i]->size;?> square foot</p>
                                <p><span class="font-green"><i class="fas fa-car"></i></span><?php echo $data[$i]->garage;?>Garages</p>
                            </li>
                            <li>
                                <p><span class="font-green"><i class="fas fa-bed"></i></span><?php echo $data[$i]->bedroom;?> Bedrooms</p>
                                <p><span class="font-green"><i class="fas fa-shower"></i></span><?php echo $data[$i]->bathroom;?> Bathrooms</p>
                            </li>
                            <hr>
                            <li>
                                <p><span class="font-green"><i class="fas fa-user-alt"></i></span><?php echo $data1[$i]->username;?></p>
                                <p><span class="font-green"><i class="fas fa-phone"></i></span><?php echo $data1[$i]->phone;?></p>
                            </li>
                        </ul>
                    </div>

                <div class="house-price"><a href="<?php echo URLROOT."houses?id=".$data[$i]->id;?>" class="btn">Price: $<?php echo $data[$i]->price ?></a></div>

                </div>
                <?php endfor; ?>
        </div>


        <div class="houses p-med">
               <?php for($i=3;$i<6;$i++): ?>
                <div class="house">
                    <div class="house-img">
                      <img src="house/<?php echo $data[$i]->profile;?>.jpg">
                      <p class="badge"><?php echo $data[$i]->bs?></p>
                    </div>
                    <div class="house-details">
                      <h1 class="s-heading text-center"><?php echo $data[$i]->housename;?></h1>
                        <p class="text-center"><span class="font-green"><i class="fas fa-map-marker-alt"></i></span><?php echo $data[$i]->houselocation;?></p>
                        <hr>
                        <ul>
                            <li>
                                <p><span class="font-green"><i class="fas fa-landmark"></i></span><?php echo $data[$i]->size;?> square foot</p>
                                <p><span class="font-green"><i class="fas fa-car"></i></span><?php echo $data[$i]->garage;?>Garages</p>
                            </li>
                            <li>
                                <p><span class="font-green"><i class="fas fa-bed"></i></span><?php echo $data[$i]->bedroom;?> Bedrooms</p>
                                <p><span class="font-green"><i class="fas fa-shower"></i></span><?php echo $data[$i]->bathroom;?> Bathrooms</p>
                            </li>
                            <hr>
                            <li>
                                <p><span class="font-green"><i class="fas fa-user-alt"></i></span><?php echo $data1[$i]->username;?></p>
                                <p><span class="font-green"><i class="fas fa-phone"></i></span><?php echo $data1[$i]->phone;?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="house-price"><a href="<?php echo URLROOT."houses?id=".$data[$i]->id;?>" class="btn">Price: $<?php echo $data[$i]->price ?></a></div>

                </div>
                <?php endfor; ?>
        </div>
    </div>
</div>

<!--services-->
    <div class="services">
            <div class="service-container">
                <div class="service-img">
                    <img src="img/service.jpg">
                </div>
                <div class="service-content">
                    <h1>We Provide</h1>
                    <ul>
                        <li>
                            <div class="service-wrapper">
                                <div class="service-font">
                                <i class="fas fa-newspaper"></i>
                                </div>
                              <div class="service-header">
                                  <h1 class="s-heading">Property Management</h1>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, harum.</p>
                             </div>
                            </div>
                        </li>
                        <li>
                             <div class="service-wrapper">
                                <div class="service-font">
                                <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="service-header">
                                    <h1 class="s-heading">Buy and Sell</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, quos?</p>
                                </div>
                             </div>
                        </li>
                        <li>
                             <div class="service-wrapper">
                                <div class="service-font">
                                <i class="fas fa-money-bill-alt"></i>
                                </div>
                                 <div class="service-header">
                                    <h1 class="s-heading">Expert Negotiating Agents</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, delectus?</p>
                                </div>
                        </li>
                    </ul>
                </div>
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