<?php include("includes/header.php"); ?>
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

if(empty($_GET['id'])){
    redirect('photos.php');

}
$photos = Photo::findbyId($_GET['id']);


if($photos) {
    $photos->id = $_GET['id'];
    $session->message("Property has been deleted");
    $photos->deletePhoto();
    redirect('photos.php');


} else {
    redirect('photos.php');
}




?>
