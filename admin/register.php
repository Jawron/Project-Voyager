<?php include('includes/header.php');?>







    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <form method="post">
                    <?php
                    $register = new Users();
                    if(isset($_POST['submit'])){
                        $register->validateUserRegistration();
                    }
                    ?>
                    <h1>Testing form</h1>
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
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="" placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-info w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>






<?php include('includes/footer.php');?>