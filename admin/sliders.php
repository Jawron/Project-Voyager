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
}

$sliders = Slider::findAll();

?>

<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
            Sliders
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>
        <a class="btn btn-outline-dark" href="add_categories.php">ADD A CATEGORY</a>
        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th colspan="2">ACTION</th>
            </tr>
            <?php foreach ($sliders as $slider) { ?>

            <tr>
                <td><?php echo $slider->id; ?>
                <td><?php echo $slider->title; ?></td>
                <td><?php echo $slider->user_id; ?></td>
                <td><a href="edit_slider.php?id=<?php echo $slider->id; ?>">EDIT </a> </td>
                <td> <a href="delete_slider.php?id=<?php echo $slider->id; ?>"> DELETE</a></td>
            </tr><br>
        </table>
    <?php } ?>
    </div>

</div>



<?php include("includes/footer.php"); ?>
