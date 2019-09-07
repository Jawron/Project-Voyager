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

?>
<?php
$slider = new Slider();

if(isset($_POST['submit1']) || isset($_POST['submit2']) || isset($_POST['submit3'])){
    $slider->title = $_POST['title'];
    $slider->alt_text = $_POST['alt_text'];
    $slider->description = $_POST['description'];
    $slider->call_to_action = $_POST['call_to_action'];
    $slider->slide_id = $_GET['id'];

    $slider->saveImages($_FILES['photos1'],$id,$slider->slide_id);
}
$title_slider = Slider::findById($_GET['id']);
$slides = new Slider();
var_export($slides);
?>
<?php




?>

<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
            SLIDER <?php echo $title_slider->title; ?>
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>

    </div>

</div>

<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <?php $slides->getPhotos($_GET['id']); ?>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>




<div class="container">

    <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="file"  name="photos1" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  name="title" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="alt_text">alt_text</label>
                        <input type="text"  name="alt_text" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="call_to_action">call_to_action</label>
                        <input type="text"  name="call_to_action" class="form-control" id="photos">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="SUBMIT" name="submit2" class="btn btn-primary pull-right" >
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="file"  name="photos1" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  name="title" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="alt_text">alt_text</label>
                        <input type="text"  name="alt_text" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="call_to_action">call_to_action</label>
                        <input type="text"  name="call_to_action" class="form-control" id="photos">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="SUBMIT" name="submit2" class="btn btn-primary pull-right" >
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="file"  name="photos1" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  name="title" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="alt_text">alt_text</label>
                        <input type="text"  name="alt_text" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <label for="call_to_action">call_to_action</label>
                        <input type="text"  name="call_to_action" class="form-control" id="photos">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="SUBMIT" name="submit3" class="btn btn-primary pull-right" >
                    </div>
                </form>
            </div>
        </div>





    </div>

</div>










<?php include("includes/footer.php"); ?>
