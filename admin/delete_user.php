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
    redirect('users.php');

}
$user = Users::findbyId($_GET['id']);


if($user) {
    $session->message("The username : {$user->username} has been deleted");
    $user->deleteUser();
    redirect('users.php');


} else {
    redirect('users.php');
}




?>
