<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role != 'admin'){
        redirect('adm_index.php');
    }
}

?>
<?php

$user = new Users();

if(isset($_POST['submit'])){
if($user){
$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->first_name = $_POST['first_name'];
$user->last_name = $_POST['last_name'];
$user->role = "client";

    if(!empty($_FILES['file_upload'])){
        $user->save();
        $user->saveImage();
        $session->message("The user has been updated");
    }

$session->message("The username : {$user->username} has been created");
redirect("users.php");

}







}


?>
<div class="container"><!--  container alert  -->
    <?php
    if(!empty($session_message)){
        echo "
        <div class=\"col-md-12\">
            <div class=\"alert alert-custom-session alert-dismissible fade show\" role=\"alert\">
                <div class=\"row\">
                    <div class=\"col-sm-1\">
                        <div class=\"session-icon\">
                            <i class=\"fas fa-exclamation-circle fa-2x\"></i>
                        </div>
                    </div>
                    <div class=\"col-sm-11\">
                        <div class=\"alert-session-text\">
                            <h1 >Hey look! An Update!</h1>
                            $session_message
                        </div>
                    </div>
                </div>
    
    
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        </div>
        ";
    }
    ?>
    <?php
    if(!empty($user->getError())){
        echo Main_object::displayValidationErrors($user->getError());
    }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#file-css-upload-1').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-1').text(fileName);
        });
        $('#file-css-upload-2').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-2').text(fileName);
        });
        $('#file-css-upload-3').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-3').text(fileName);
        });

    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0">
            <div class="header-container">
                <h1 style="padding-top:50px;text-align: center">Add new User</h1>

            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label >Choose images to upload</label>
                    <label class="label-css" for="file-css-upload-2">
                        <span class="file-upload-text-2">File upload</span>
                        <span class="button-file-upload-2"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                    </label>
                    <input type="file"  name="file_upload" id="file-css-upload-2" class="upload-field-css" >

                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="submit" value="Create new User" name="submit" class="button-save-submit" >
                </div>
            </form>
            <ul class="add-property-info">
                <li><i class="fas fa-info-circle"></i> Users created here are without email address, this will be added when the
                    account will be transferred to the real holder.</li>
                <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                    describe two appropriate category names.</li>
            </ul>
        </div>
    </div
</div>

<?php include("includes/footer.php"); ?>
