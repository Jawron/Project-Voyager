<?php include("includes/header.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
}

if(empty($_GET['id'])){
    redirect('sliders.php');

}
$property = Slider::findbyId($_GET['id']);


if($property) {
    $property->id = $_GET['id'];
    $session->message("Slider has been deleted");
    $property->deleteSlider();
    redirect('sliders.php');


} else {
    redirect('sliders.php');
}




?>