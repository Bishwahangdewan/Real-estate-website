  <?php require APPROOT . '/views/layout/header.php'; ?>
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
             <li><a href="<?php echo URLROOT.'users/login'; ?>">Login</a></li>
            <li><a href="<?php echo URLROOT.'users/register'; ?>">Signup</a></li>
        </ul>
    </nav>

    <div class="register-spacing"></div>


    <div class="main-row">
        <div class="main-col">
            <div class="card">
                <h1>Sign Up</h1>
                <p>Create an account</p>
                <form action="<?php echo URLROOT.'users/register' ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name:<sup>*<sup></label>
                        <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>"> 
                        <span class="invalid-feedback"><?php echo (empty($data['name_err']))? "" :$data['name_err'];?></span>
                    </div>


                   <div class="form-group">
                        <label for="email">Email:<sup>*<sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']))?'is-invalid':''?>" value="<?php echo $data['email']; ?>"> 
                        <span class="invalid-feedback"><?php echo (empty($data['email_err']))? "" :$data['email_err'];?></span>
                    </div>


                    <div class="form-group">
                        <label for="password">Password:<sup>*<sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))?'is-invalid':''?>"> 
                        <span class="invalid-feedback"><?php echo (empty($data['password_err']))? "" :$data['password_err'];?></span>
                    </div>



                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:<sup>*<sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err']))?'is-invalid':''?>"> 
                        <span class="invalid-feedback"><?php echo (empty($data['confirm_password_err']))? "" :$data['confirm_password_err'];?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Signup" class="btn-success">
                            <a href="<?php echo URLROOT.'users/login'?>" class="btn btn-light btn-block">Have an account?Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--call footer-->
    <?php require APPROOT.'/views/layout/footer.php'; ?>