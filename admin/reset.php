<?php include ('includes/header.php');?>
    <div class="container">
        <br>
        <div class="row jumbotron border-b-1-0 col-10 offset-1">
            <?php
            $reset_pass = new Users;
            $reset_pass->passwordReset();


            ?>
            <div class="container">

                <h2 class="lead text-center py-3">RESET PASSWORD</h2>
                <hr class="my-4">
                <div class="col-8 offset-2">
                    <form id="register-form" method="post" role="form" >

                        <div class="form-group">
                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3">
                                    <input type="submit" name="reset-password-submit" id="reset-password-submit" tabindex="4" class="form-control btn btn-outline-info" value="Reset Password">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="hide" name="token" id="token" value="<?php echo $reset_pass->tokenGenerator();?>">
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php include ('includes/footer.php');?><?php
