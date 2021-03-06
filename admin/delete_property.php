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
    redirect('properties.php');

}
$property = Property::findbyId($_GET['id']);


if($property) {
    $property->id = $_GET['id'];
    $session->message("Property has been deleted");
    $property->deleteProperty();
    redirect('properties.php');


} else {
    redirect('properties.php');
}




?>