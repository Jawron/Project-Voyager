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
}

$photos = Photo::findAll();

?>

<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
            Categories
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>

            <?php foreach ($photos as $photo) { ?>
                <div class="col-4" style="float: left">
                    <a href="edit_photo.php?id=<?php echo $photo->id;?>">
                        <img src="images/<?php echo $photo->photo?>" class="img-fluid">
                    </a>
                </div>








            <?php } ?>






    </div>


</div>



<?php include("includes/footer.php"); ?>
