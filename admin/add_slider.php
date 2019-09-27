<?php use http\Client\Curl\User;

include("includes/header.php"); ?>
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
    if($role != 'admin'){
        redirect('adm_index.php');
    }
}

?>
<?php
$slider = new Slider();
if(isset($_POST['submit1'])){
    $slider->title = $_POST['title'];
    $slider->alt_text = $_POST['alt_text'];
    $slider->description = $_POST['description'];
    $slider->call_to_action = $_POST['call_to_action'];
    $slider->slide_id = $_GET['id'];

    $slider->saveImages($_FILES['photos1'],$id,$slider->slide_id);
    redirect("add_slider.php?id={$_GET['id']}#second-tab");
} elseif (isset($_POST['submit2'])){
    $slider->title = $_POST['title'];
    $slider->alt_text = $_POST['alt_text'];
    $slider->description = $_POST['description'];
    $slider->call_to_action = $_POST['call_to_action'];
    $slider->slide_id = $_GET['id'];

    $slider->saveImages($_FILES['photos2'],$id,$slider->slide_id);
    redirect("add_slider.php?id={$_GET['id']}#third-tab");
} elseif (isset($_POST['submit3'])){
    $slider->title = $_POST['title'];
    $slider->alt_text = $_POST['alt_text'];
    $slider->description = $_POST['description'];
    $slider->call_to_action = $_POST['call_to_action'];
    $slider->slide_id = $_GET['id'];

    $slider->saveImages($_FILES['photos3'],$id,$slider->slide_id);
    redirect("add_slider.php?id={$_GET['id']}");
}

$slides = new Slider();
?>
<br>
<?php

$title_slider = Slider::findByID($_GET['id']);
?>

<div class="container">


<?php

?>

    <div class="col-md-12">
        <h1 class="page-header">
            SLIDER: <?php echo $title_slider->title;
            ?>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>

    </div>

</div>

<!-- Slideshow container -->

<div class="container-fluid">
    <div id="slideshow" style="margin-bottom: 20px">
        <div class="slide-wrapper">
            <?php $slides->getPhotos($_GET['id']); ?>
        </div>
    </div>
</div>



<style>

</style>
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

    <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item col-md-4 col-xs-12 ">
                <a class="nav-link active pills-css-custom" id="pills-home-tab" data-toggle="pill" href="#first-tab" role="tab" aria-controls="first-tab" aria-selected="true">First Slide</a>
            </li>
            <li class="nav-item col-md-4 col-xs-12">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#second-tab" role="tab" aria-controls="second-tab" aria-selected="false">Second Slide</a>
            </li>
            <li class="nav-item col-md-4 col-xs-12">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#third-tab" role="tab" aria-controls="third-tab" aria-selected="false">Third Slide</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="first-tab" role="tabpanel" aria-labelledby="first-tab-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label >Upload a photo</label>
                                <label class="label-css" for="file-css-upload-1">
                                    <span class="file-upload-text-1">File upload</span>
                                    <span class="button-file-upload-1"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                                </label>
                                <input type="file"  id="file-css-upload-1" class="upload-field-css" name="photos1" >
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="alt_text">Alternative text</label>
                                <input type="text"  name="alt_text" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label for="title">Title</label>
                                <input type="text"  name="title" class="form-control" id="photos">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="call_to_action">Call_to_action</label>
                                <input type="text"  name="call_to_action" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="NEXT ->" name="submit1" class="edit-button w-100" >
                    </div>
                </form>
            </div>




            <div class="tab-pane fade" id="second-tab" role="tabpanel" aria-labelledby="second-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label >Upload a photo</label>
                                <label class="label-css" for="file-css-upload-2">
                                    <span class="file-upload-text-2">File upload</span>
                                    <span class="button-file-upload-2"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                                </label>
                                <input type="file"  id="file-css-upload-2" class="upload-field-css" name="photos2" >
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="alt_text">Alternative text</label>
                                <input type="text"  name="alt_text" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label for="title">Title</label>
                                <input type="text"  name="title" class="form-control" id="photos">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="call_to_action">Call_to_action</label>
                                <input type="text"  name="call_to_action" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="NEXT ->" name="submit2" class="edit-button w-100" >
                    </div>
                </form>
            </div>




            <div class="tab-pane fade" id="third-tab" role="tabpanel" aria-labelledby="third-tab-tab">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label >Upload a photo</label>
                                <label class="label-css" for="file-css-upload-3">
                                    <span class="file-upload-text-3">File upload</span>
                                    <span class="button-file-upload-3"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                                </label>
                                <input type="file"  id="file-css-upload-3" class="upload-field-css" name="photos3" >
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="alt_text">Alternative text</label>
                                <input type="text"  name="alt_text" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12" style="margin-right: -15px">
                                <label for="title">Title</label>
                                <input type="text"  name="title" class="form-control" id="photos">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="call_to_action">Call_to_action</label>
                                <input type="text"  name="call_to_action" class="form-control" id="photos">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  name="description" class="form-control" id="photos">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SAVE SLIDER" name="submit3" class="edit-button w-100" >
                    </div>
                </form>
            </div>
        </div>





    </div>

</div>




<script>
    jQuery(document).ready(function ($) {
        let selectedTab = window.location.hash;
        $('.nav-link[href="' + selectedTab + '"]' ).trigger('click');
    })
</script>






<?php include("includes/footer.php"); ?>
