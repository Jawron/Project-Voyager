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

$categories = Category::findAll();

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
<!--        <a class="btn btn-outline-dark" href="add_categories.php">ADD A CATEGORY</a>-->
<div class="container">
    <div class="col">
        <div class="header-container">
            <h1>Categories</h1>
            <p>Here you can see, add, edit or delete a category from your CMS.</p>
            <a class="add-category" href="add_categories.php" style="position: absolute"><i class="far fa-plus-square"></i> Add New</a>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class=" col-md-12">
            <?php foreach ($categories as $category) { ?>
            <div class="category-row">
                <div class="col-md-1">
                    <p class="category-id"><?php echo $category->id; ?></p>
                </div>
                <div class="col-md-3">
                    <p class="category-name"><?php echo $category->cat_name; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="category-desc"><?php echo $category->cat_desc; ?></p>
                </div>
                <div class="col-md-4">
                    <p class="category-action-buttons">
                        <a class="edit-button" href="edit_categories.php?id=<?php echo $category->id; ?>">EDIT</a>
                        <a class="delete-button" href="delete_category.php?id=<?php echo $category->id; ?>">DELETE</a>
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>
