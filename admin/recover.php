<?php include ('includes/header.php');?>
<?php include("../includes/main-nav.php"); ?>



<div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 ">
        <div class="alert-placeholder">
            <?php
            $recover = new Users();
            $recover->recoverPassword();

            ?>

        </div>
    </div>
</div>
<style>
    .code-btn-validate{
        width: 100%;
        color: white;
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
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off" />
                </div>
                <div class="form-group">
                    <input type="submit" name="recover-submit" id="recover-submit" tabindex="2" class="code-btn-validate form-control btn btn-success" value="Send Password Reset Link" />

                </div>
                <div class="form-group">
                    <input type="submit" name="cancel_submit" id="cencel-submit" tabindex="2" class="code-btn-validate form-control btn btn-danger" value="Cancel" />

                </div>
                <input type="hidden" class="hide" name="token" id="token" value="<?php echo $recover->tokenGenerator();?>">
            </form>
            <ul class="add-property-info">
                <li><i class="fas fa-info-circle"></i> Complete with your email address.</li>
                <li><i class="fas fa-info-circle"></i> After completing press "Sent password reset link" and follow the instructions in the mail</li>
                <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                    describe two appropriate category names.</li>
            </ul>
        </div>
    </div>
</div>















<?php include ('includes/footer.php');?><?php
