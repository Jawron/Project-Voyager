<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
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

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12 offset-xs-0">
            <div class="header-container">
                <h1 style="padding-top:50px;text-align: center">Add new Images</h1>

            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="title">Choose images to upload</label>
                    <input type="file" style="display: none" name="file_upload" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                    <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1
                             0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6
                              3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                            Choose a file&hellip;</strong>
                    </label>
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
