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
    $id = Users::clean($_SESSION['user_id']['id']);
}

?>
<?php

    $photo = new Photo();

    if(isset($_POST['submit'])){
        $file = $_FILES['photos'];
        $user_id = $id;
        $photo->saveImages($file,$user_id);

    }
?>

<div class="container">

    <div class="col-md-12">
        <h1 class="page-header">
            Add Photos
            <small>Subheading</small>
        </h1>
        <?php echo "<h1>$session_message </h1>"; ?>


        <form action="" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="file" multiple name="photos[]" class="form-control" id="photos">
            </div>

            <div class="form-group">
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary pull-right" >
            </div>
        </form>
        <div id="upload_list"></div>

    </div>

</div>
<p id="p"  >ssss</p>
<p></p>
<script>
    $('#photos').change(function(e) {
        var files = e.target.files;

        for (var i = 0, file; file = files[i]; i++) {
            $('#p').append('<img src="images/'+ file.name + '"width="200px">');
            console.log(file.name);
        }
    });
</script>



<?php include("includes/footer.php"); ?>
