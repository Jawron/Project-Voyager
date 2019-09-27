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
}

?>
<?php

if(empty($_GET['id'])){
    redirect('categories.php');
}

$category = Category::findById($_GET['id']);

if(isset($_POST['update'])){
    $category->cat_name = $_POST['cat_name'];
    $category->cat_desc = $_POST['cat_desc'];
    $category->save();
    $session->message("The category  : {$category->cat_name} has been Updated");
    redirect("categories.php");

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
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="header-container">
                <h1 style="padding-top:50px;text-align: center">Edit category</h1>

            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="">

                    <div class="form-group">
                        <label for="username">Category Name</label>
                        <input type="text" name="cat_name" class="form-control" value="<?php echo $category->cat_name;?>">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Category Description (Optional)</label>
                        <input type="text" name="cat_desc" class="form-control" value="<?php echo $category->cat_desc;?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create a new category" name="update" class="button-save-submit" >
                    </div>

                </div>

            </form>
            <ul class="add-property-info">
                <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                <li><i class="fas fa-info-circle"></i> Category description is optional but recommended to fill, it may be used to
                    describe two appropriate category names.</li>
            </ul>
        </div>
    </div>
</div>














<?php include("includes/footer.php"); ?>
