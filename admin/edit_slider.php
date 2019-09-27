

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

?>
<?php

$title_slider = Slider::findById($_GET['id']);

$edit_slides = new Slider();

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

<div class="container">

    <?php
    $edit_slides->getSlidesToEdit($_GET['id']);


    ?>


</div>
