<?php require APPROOT . '/views/layout/header.php'; ?>
  <!--Navbar-->
   <nav id="navbar" class="bg-change">
    <div>
     <h1 class="logo"><a href="#"><span class="font"><i class="fas fa-home"></i></span>Homebuyers</a></h1>
     <a class="icon"><i class="fas fa-bars"></i></a>
    </div>
        <ul>
            <li><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li><a href="#">Buy</a></li>
            <li><a href="#">Rent</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Agent</a></li>
        </ul>
           
        <ul>
        <li><a href="<?php echo URLROOT.'users/login'; ?>">Login</a></li>
            <li><a href="<?php echo URLROOT.'users/register'; ?>">Signup</a></li>
        </ul>
    </nav>

    <div class="register-spacing"></div>

 <div class="main-row">
        <div class="main-col">
            <div class="card">
                <h1>Login</h1>
                <p>Enter your name and password</p>
                <form action="<?php echo URLROOT.'users/login' ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Email:<sup>*<sup></label>
                        <input type="email" name="email" class="form-control form-control-lg" value="<?php echo $data['email']; ?>"> 
                        <span class="invalid-feedback"><?php echo (empty($data['email_err']))? "" :$data['email_err'];?></</span>
                    </div>


                    <div class="form-group">
                        <label for="password">Password:<sup>*<sup></label>
                        <input type="password" name="password" class="form-control"> 
                        <span class="invalid-feedback"><?php echo (empty($data['password_err']))? "" :$data['password_err'];?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                            <a href="<?php echo URLROOT.'users/register'?>" class="btn btn-light btn-block">Don't have an account?Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!--call footer-->
        <?php require APPROOT.'/views/layout/footer.php'; ?>