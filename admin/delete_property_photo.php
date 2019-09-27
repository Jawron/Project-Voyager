<?php include("includes/header.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role != 'admin'){
        redirect('adm_index.php');
    }
}

if(empty($_GET['id'])){
    redirect('photos.php');

}
$photos = Photo::findbyId($_GET['id']);


if($photos) {
    $photos->id = $_GET['id'];
    $session->message("Photo has been deleted");
    $photos->deletePhoto();
    redirect($_SERVER['HTTP_REFERER']);


} else {
    redirect('photos.php');
}




?>