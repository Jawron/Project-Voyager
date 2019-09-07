<?php include("includes/header.php"); ?>
<?php include("includes/left-nav.php"); ?>
<?php include("includes/top-nav.php"); ?>
<?php
if(!$session->isSignedIn()){
    redirect('login.php');
} else {
    $username = Users::clean($_SESSION['user_id']['username']);
    $role = Users::clean($_SESSION['user_id']['role']);
    $id = Users::clean($_SESSION['user_id']['id']);
}

?>
<?php
$property = new Property();

if(isset($_POST['submit'])){

    $property->type = $_POST['type'];
    $property->title = $_POST['title'];
    $property->id = $id;
    $property->createProperty();
    $session->message("Property Created");
    redirect("add_property_type.php?id={$property->getLastInsertedProperty($property->id)}");

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
    if(!empty($photo->getError())){
        echo Main_object::displayValidationErrors($property->getError());
    }
    ?>
</div><!--  end container alert  -->



<div class="container">
    <div class="row">
        <div class="add-property-logo">
            <i class="fas fa-plus-circle add-property-logo-styled" style=""></i>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 offset-3">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Choose a Title</label>
                        <input type="text" name="title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="type">Select the type of the property</label>
                        <select id ="select" name="type" class="form-control">
                            <option value="apartament" selected>Apartament</option>
                            <option value="apartament">Apartament</option>
                            <option value="casa">House</option>
                            <option value="teren">Field</option>
                            <option value="spatiu comercial">Commercial Space</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Create a new Listing" name="submit" class="button-save-submit" >
                    </div>
                </form>
                <ul class="add-property-info">
                    <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                    <li><i class="fas fa-info-circle"></i> This will take you to a custom page were you will be able to finish the details for your listing</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>








<?php include("includes/footer.php"); ?>
