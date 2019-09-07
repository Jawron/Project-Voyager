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

if(empty($_GET['id'])){
    redirect('properties.php');
}

$property = Property::findById($_GET['id']);





?>
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                            <?php $property->editType($property->type)?>
                </div>
            </div>
        </div>

<?php include("includes/footer.php"); ?>