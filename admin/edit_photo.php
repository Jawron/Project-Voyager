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
        redirect('edit_user.php?id='.Users::clean($_SESSION['user_id']['id']));
    }
    $id = Users::clean($_SESSION['user_id']['id']);
}

$photos = Photo::findById($_GET['id']);

if(isset($_POST['submit'])){
    $photos->caption = $_POST['caption'];
    $photos->alt_text = $_POST['alt_text'];
    $photos->id = $_GET['id'];
    $photos->saveEditedPhoto();
}



?>

<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
           Edit Photo
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>








        <div class="row">
            <div class="container">
                <img src="images/<?php echo $photos->photo; ?>" class="img-fluid">
            </div>
        </div>
        <form action="" enctype="multipart/form-data" method="post">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="caption">Photo Name</label>
                    <input type="text" name="caption" class="form-control" value="<?php echo $photos->caption; ?>" >
                </div>
                <div class="form-group">
                    <label for="alt_text">Alt Text</label>
                    <input type="text" multiple name="alt_text" class="form-control" value="<?php echo $photos->alt_text; ?>" >
                </div>

                <div class="form-group">
                    <input type="submit" value="Edit" name="submit" class="btn btn-primary pull-right" >
                </div>
                <div class="form-group">
                    <a href="delete_photo.php?id=<?php echo $photos->id; ?>" class="btn btn-danger">DELETE</a>
                </div>
            </div>

        </form>





    </div>
    <pre>
            <?php var_export($photos);?>
        </pre>

</div>



<?php include("includes/footer.php"); ?>
