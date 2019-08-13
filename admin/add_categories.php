<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
}

?>
<?php

$category = new Category();

if(isset($_POST['submit'])){

        $category->cat_name = $_POST['cat_name'];
        $category->cat_desc = $_POST['cat_desc'];
        $category->save();
        $session->message("The category  : {$category->cat_name} has been created");
        redirect("categories.php");

}


?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Add a Category
                    <small>Subheading</small>
                </h1>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                            <label for="username">Category Name</label>
                            <input type="text" name="cat_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="first_name">Category Description</label>
                            <input type="text" name="cat_desc" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Create a Motherfucker" name="submit" class="btn btn-primary pull-right" >
                        </div>

                    </div>

                </form>


                <hr>




            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



<?php include("includes/footer.php"); ?>
