<?php include ('includes/header.php');?>
<?php include("../includes/main-nav.php"); ?>



    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 ">
            <div class="alert-placeholder">
                <?php
                $reset_pass = new Users;
                $reset_pass->passwordReset();
                ?>

            </div>
        </div>
    </div>
    <style>
        .code-btn-validate{
            width: 100%;

        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0">
                <div class="header-container">
                    <h1 style="padding-top:50px;text-align: center">Recover Password</h1>

                </div>
                <form id="register-form"  method="post" role="form" autocomplete="off">
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="reset-password-submit" id="reset-password-submit" tabindex="4" class="code-btn-validate form-control btn btn-outline-info" value="Reset Password">
                    </div>
                    <input type="hidden" class="hide" name="token" id="token" value="<?php echo $reset_pass->tokenGenerator();?>">                </form>
                <ul class="add-property-info">
                    <li><i class="fas fa-info-circle"></i> Choose a new password.</li>
                    <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                    <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                        describe two appropriate category names.</li>
                </ul>
            </div>
        </div>
    </div>









