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
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Add USer
                    <small>Subheading</small>
                </h1>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="file_upload">Image Upload</label>
                            <input type="file" name="file_upload" class="form-control" >
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
                            <input type="submit" value="Create a Motherfucker" name="submit" class="btn btn-primary pull-right" >
                        </div>

                    </div>

                </form>


                <hr>




            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<?php include("includes/footer.php"); ?>
