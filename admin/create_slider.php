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


$slider = new Slider();

if(isset($_POST['submit'])){

    $slider->title = $_POST['title'];
    $slider->id = $id;
    $slider->createSlider();
    $session->message("Slider Created");
    redirect("add_slider.php?id={$slider->getLastInsertedSlider($slider->id)}");

}

?>


<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
            Add Photos
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>


        <form action="" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" multiple name="title" class="form-control" id="">
            </div>

            <div class="form-group">
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary pull-right" >
            </div>
        </form>
    </div>

</div>




<?php include("includes/footer.php"); ?>
