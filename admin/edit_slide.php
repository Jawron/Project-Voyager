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
    $id = Users::clean($_SESSION['user_id']['id']);
}

$slider = new Slider();

if(isset($_POST['submit'])){
    $slider->title = $_POST['title'];
    $slider->alt_text = $_POST['alt_text'];
    $slider->description = $_POST['description'];
    $slider->call_to_action = $_POST['call_to_action'];
    $slider->slide_id = $_GET['id'];

    $slider->editFields($slider->slide_id);
    $slider->editImages($_FILES['photos'],$id,$slider->slide_id);
}

$existing_slide = Slider::findByIDSlide($_GET['id']);
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
                <input type="file"  name="photos" class="form-control" id="photos">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"  name="title" class="form-control" id="photos" value="<?php echo $existing_slide->title; ?>">
            </div>
            <div class="form-group">
                <label for="alt_text">alt_text</label>
                <input type="text"  name="alt_text" class="form-control" id="photos" value="<?php echo $existing_slide->alt_text; ?>">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text"  name="description" class="form-control" id="photos" value="<?php echo $existing_slide->description; ?>">
            </div>
            <div class="form-group">
                <label for="call_to_action">call_to_action</label>
                <input type="text"  name="call_to_action" class="form-control" id="photos" value="<?php echo $existing_slide->call_to_action; ?>">
            </div>

            <div class="form-group">
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary pull-right" >
            </div>
        </form>
    </div>

</div>




<?php include("includes/footer.php"); ?>
