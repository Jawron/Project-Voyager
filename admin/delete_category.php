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
    redirect('categories.php');

}
$category = Category::findbyId($_GET['id']);


if($category) {
    $category->id = $_GET['id'];
    $session->message("category  has been deleted");
    $category->deleteCategory();
    redirect('categories.php');


} else {
    redirect('categories.php');
}




?>
