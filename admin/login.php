<?php include('includes/header.php');?>






<style>

</style>



<div class="container-fluid">
    <div class="row" >
        <div class="col-md-4 col-xs-12" style="padding-left:0;padding-right: 0">
            <div class="login-form">
                <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0" >
                    <br>
                    <a href="../index.php"><img src="images/logo.png" style="height: 80px;width: auto"></a>

                    <form method="post" class="login-form-form">


                        <?php
                        global $session;
                        //Checks if the user is logged in,if he is it will be redirected to the admin page
                        // else will continue to login
                        if($session->isSignedIn()){
                            redirect('adm_index.php');
                        }


                        if(isset($_POST['submit'])){
                            $user_login = new Users();
                            $username = trim($_POST['username']);
                            $password = trim($_POST['password']);
                            $remember = isset($_POST['remember']);

                            //checks the values that are introduced in the form inputs and returns an array
                            $user_found = $user_login->verifyUser($username,$password,$remember);

                            // Check if the statement is true
                            // Calls the function login from the session to assigns it values to the $_SESSION superglobal
                            //Redirects the user to the admin page
                            //And sets a welcome message in the session message
                            if($user_found) {
                                $session->login($user_found);
                                $session->message("user logged iin $username & $remember");
                                redirect("adm_index.php");


                            } else {
                                $session->message("<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    Wrong credentials!!!
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                       <span aria-hidden=\"true\">&times;</span>
                    </button>
               </div>");
                            }
                        } else {
                            $username = "";
                            $password = "";
                            $session_message = "";
                        }

                        ?>
                        <?php
                        echo "$session_message";?>

                        <h1>Login</h1>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id=""  name="username" placeholder="Type your username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Type your password">
                        </div>
                        <!--                <div class="form-group text-center">-->
                        <!--                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember" >-->
                        <!--                    <label for="remember"> Remember Me</label>-->
                        <!--                </div>-->
                        <br>
                        <div class="col-md-7 col-xs-12" style="padding-left: 0">
                            <button type="submit" name="submit" class="btn btn-info w-100">Login</button>
                            <br><br>
                            <a href="register.php" class="register-text"> Registration Form </a>
                            <a href="recover.php" class="register-text"> Recover Pass </a>
                        </div>
                    </form>
                    <br>
                    <ul class="add-property-info">
                        <li><i class="fas fa-info-circle"></i> Remember that username has only <strong>letters</strong></li>
                        <li><i class="fas fa-info-circle"></i> Remember that the password has <strong>letters and numbers</strong></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-8 col-xs-12 d-none d-sm-block" style="padding-left:0;padding-right: 0">
            <div class="login-bg-img">
                <div class="container">
                    <h1>WELCOME</h1>
                    <p><strong>Voyager</strong> is a real-estate program meant to establish a connection with buyers and sellers across multiple areas such as states and even countries</p>
                    <p><strong>Log in to unlock the power of the program</strong></p>
                    <p>If you dont have an account! Create one now here -> <a href="register.php"> Registration Form </a></p>
                </div>

            </div>
        </div>
    </div>
</div>




<?php include('includes/footer.php');?>
