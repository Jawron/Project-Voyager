<?php include('includes/header.php');?>



<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <?php

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
                    $session->message("<h4 class=\"bg-danger\">Credentials Wrong!</h4>");
                }
            } else {
                $username = "";
                $password = "";
                $session_message = "";
            }

            ?>
            <?php
            echo "$session_message";?>
            <form method="post">

                <h1>Testing form</h1>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id=""  name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="Password">
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember" >
                    <label for="remember"> Remember Me</label>
                </div>
                <button type="submit" name="submit" class="btn btn-info w-100">Submit</button>
            </form>
        </div>
    </div>
</div>






<?php include('includes/footer.php');?>
