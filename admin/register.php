<?php include('includes/header.php');?>



<style>

</style>



    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-3 col-xs-12" style="padding-left:0;padding-right: 0">
                <div class="register-left-side">
                    <div class="logo-register">
                        <a href="../index.php">
                        <img src="images/logo.png">
                        </a>
                    </div>
                    <div class="register-text-left d-none d-sm-block">
                        <h1><span>WELCOME</span> <br>TO VOYAGER</h1>
                        <p><strong>Voyager</strong> is a real-estate program meant to establish a connection with buyers
                            and sellers across regions</p>
                        <hr>

                        <div class="social-links-register">
                            <ul>
                                <li><a href="" class="facebook"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="" class="pinterest"><i class="fab fa-pinterest-square"></i></a></li>
                                <li><a href="" class="linkedin"><i class="fab fa-linkedin"></i></a></li>
                            </ul>


                        </div>
                        <ul class="ul-links-register">
                            <li>Terms & Conditions</li>
                            <li>Privacy Policy</li>
                            <li>Copyright @ Alex</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xs-12" style="padding-left:0;padding-right: 0">
                <div class="register-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0">
                                <br><br>
                                <form method="post">
                                    <h2>Registration Form</h2>
                                    <?php
                                    $register = new Users();
                                    if(isset($_POST['submit'])){
                                        $register->validateUserRegistration();
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Firstname</label>
                                        <input type="text" class="form-control" name="first_name" id="" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lastname</label>
                                        <input type="text" class="form-control" name="last_name" id="e" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" id=""  name="username" placeholder="Username">
                                        <small id="emailHelp" class="form-text text-muted">Username must contain only <strong>letters</strong></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password" id="" placeholder="Password">
                                        <small id="emailHelp" class="form-text text-muted">Remember passwords <strong>must</strong> match!</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="" placeholder="Password">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-info w-100" style="padding:10px"><i class="fas fa-pencil-alt"></i> Register</button>
                                </form>
                                <br>
                                <small id="emailHelp" class="form-text text-muted">Already have an account? <a href="login.php">Login here</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php include('includes/footer.php');?>