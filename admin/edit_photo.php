<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    if($role == 'client'){
        redirect('adm_index.php');
    }
    $id = Users::clean($_SESSION['user_id']['id']);
}

$photos = Photo::findById($_GET['id']);

if(isset($_POST['submit'])){
    $photos->caption = $_POST['caption'];
    $photos->alt_text = $_POST['alt_text'];
    $photos->id = $_GET['id'];
    $photos->saveEditedPhoto();
    $session->message("This photo has been updated");
    redirect("edit_photo.php?id={$photos->id}");
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
    <?php
    if(!empty($photos->getError())){
        echo Main_object::displayValidationErrors($photos->getError());
    }
    ?>
</div>
<style>

</style>

<div class="container">
    <div class="row">
        <div class="header-container">
            <h1 style="padding-top:50px;text-align: center">Edit category</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8"><img src="images/<?php echo $photos->photo; ?>" class="img-fluid photo-edit-img"></div>
        <div class="col-md-4">
            <div class="photo-info">
                <h5>Image information:</h5>
                <br>
                <p><strong>ID: </strong><?php echo $photos->id; ?></p>
                <p><strong>Photo name: </strong><?php echo $photos->photo; ?></p>
                <p><strong>Photo title: </strong><?php echo $photos->caption; ?></p>
                <p><strong>Alternative text: </strong><?php echo $photos->alt_text; ?></p>
                <p><strong>Type: </strong><?php echo $photos->type; ?></p>
                <p><strong>Size: </strong><?php echo $photos->size; ?></p>
                <p><strong>Uploaded by: </strong><?php echo $photos->getUserById($photos->user_id); ?></p>
                <p><strong>Featured in any post: </strong><?php echo $photos->is_featured == NULL ? "No" : "yes" ; ?></p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="form-group">
                        <label for="caption">Photo Name</label>
                        <input type="text" name="caption" class="form-control" value="<?php echo $photos->caption; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="alt_text">Alt Text</label>
                        <input type="text" multiple name="alt_text" class="form-control" value="<?php echo $photos->alt_text; ?>" >
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Edit" name="submit" class="btn btn-primary edit-photo-button" >
                        <a href="delete_photo.php?id=<?php echo $photos->id; ?>" class="btn btn-danger delete-photo-button">DELETE</a>
                    </div>
                    <div class="form-group">

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>








<?php include("includes/footer.php"); ?>
