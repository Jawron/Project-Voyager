<?php include("includes/header.php"); ?>
<?php include("../includes/main-nav.php"); ?>

    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 ">
            <div class="alert-placeholder">
                <?php
                $code= new Users();
                $code->validateCode();

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
                            <h1 style="padding-top:50px;text-align: center">Reset code</h1>

                        </div>
                        <form action="" enctype="multipart/form-data" method="post">
                            <form  method="post" role="form" autocomplete="off">
                                <div class="form-group">
                                    <input type="text" name="code" id="code" tabindex="1" class="form-control" placeholder="##########" value="<?php if(isset($_GET['code'])){ echo $_GET['code']; } else { echo '';}  ?>" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                            <input type="submit" name="code-submit" id="recover-submit" tabindex="2" class="code-btn-validate form-control btn btn-success" value="Continue" />
                                </div>
                                <div class="form-group">
                                            <input type="submit" name="code-cancel" id="code-cancel" tabindex="2" class="code-btn-validate form-control btn btn-danger" value="Cancel" />
                                </div>
                            </form>
                        </form>
                        <ul class="add-property-info">
                            <li><i class="fas fa-info-circle"></i> Complete with the code received in email address.</li>
                            <li><i class="fas fa-info-circle"></i> If you clicked on the link from email the code will auto complete, if not you must complete yourself with the code in the mail</li>
                            <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                            <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                                describe two appropriate category names.</li>
                        </ul>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>
