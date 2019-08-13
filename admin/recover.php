<?php include ('includes/header.php');?>
<div class="container">
    <br>
    <div class="row jumbotron border-b-1-0 col-10 offset-1">

        <div class="container">
            <?php
            $recover = new Users();
            $recover->recoverPassword();

            ?>
            <h2 class="lead text-center py-3">RECOVER ACCOUNT</h2>
            <hr class="my-4">
            <div class="col-8 offset-2">
                <form id="register-form"  method="post" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <input type="submit" name="cancel_submit" id="cencel-submit" tabindex="2" class="form-control btn btn-danger" value="Cancel" />
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <input type="submit" name="recover-submit" id="recover-submit" tabindex="2" class="form-control btn btn-success" value="Send Password Reset Link" />
                            </div>


                        </div>
                    </div>
                    <input type="hidden" class="hide" name="token" id="token" value="<?php echo $recover->tokenGenerator();?>">
                </form>
            </div>
        </div>
    </div>
</div>
