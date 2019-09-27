<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $id = Users::clean($_SESSION['user_id']['id']);
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role == 'client'){
        redirect('adm_index.php');
    }
}
if($role == 'admin'){
    $photos = Photo::findAll();
} elseif ($role == 'broker'){

    $photos = Photo::findByQuery("SELECT * FROM photo WHERE user_id = {$id}");
} else {
    redirect('adm_index.php');
}




?>
<div class="container"><!--  container alert  -->
    <?php
    if(!empty($session_message)){
        echo "
            <div class=\"col-md-12\">
                <div class=\"alert alert-custom-session alert-dismissible fade show\" role=\"alert\">
                    <div class=\"row\">
                        <div class=\"col-sm-1\">
                            <div class=\"session-icon\">
                                <i class=\"fas fa-exclamation-circle fa-2x\"></i>
                            </div>
                        </div>
                        <div class=\"col-sm-11\">
                            <div class=\"alert-session-text\">
                                <h1 >Hey look! An Update!</h1>
                                $session_message
                            </div>
                        </div>
                    </div>
        
        
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
            </div>
            ";
    }
    ?>
</div>

<div class="container">
    <div class="col">
        <div class="header-container">
            <h1>Photo Gallery</h1>
            <p>Browse in all the photos on the server</p>
            <a class="add-category" href="add_photo.php" style="position: absolute"><i class="far fa-plus-square"></i> Add New</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-all">
        <?php foreach ($photos as $photo) { ?>
        <div class="container">
            <a href="edit_photo.php?id=<?php echo $photo->id;?>" class="edit-image" >Edit</a>
            <img src="images/<?php echo $photo->photo?>">

        </div>
        <?php } ?>
    </div>
</div>


<?php include("includes/footer.php"); ?>
