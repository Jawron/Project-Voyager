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

$properties = Property::findAll();

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
            <h1>Properties</h1>
            <p>All property listed below with additional information, click one to see more</p>
            <a class="add-property" href="add_property.php" ><i class="far fa-plus-square"></i> Add New</a>
        </div>
    </div>
</div>

<style>

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="properties-title">
                <div class="col-md-1">ID</div>
                <div class="col-md-3">TITLE</div>
                <div class="col-md-2">TYPE</div>
                <div class="col-md-1">PRICE</div>
                <div class="col-md-1">COMMISSION</div>
                <div class="col-md-1">EXPIRES</div>
                <div class="col-md-3">ACTIONS</div>
            </div>
            <?php foreach ($properties as $property) { ?>
            <div class="properties-row">
                <div class="col-md-1">
                    <p class="property-id"><?php echo $property->id; ?></p>
                </div>
                <div class="col-md-3">
                    <p class="property-title"><?php echo $property->title; ?></p>
                </div>
                <div class="col-md-2">
                    <p class="property-type"><?php echo $property->type; ?></p>
                </div>
                <div class="col-md-1">
                    <p class="property-price">
                        <?php
                        if($property->type == 'rent'){
                            echo "<i class=\"fas fa-dollar-sign\"></i> $property->price /mp</p>";
                        } else {
                            echo "<i class=\"fas fa-dollar-sign\"></i> $property->price</p>";
                        }
                        ?>
                </div>
                <div class="col-md-1">
                    <p class="property-commission"><?php echo $property->commission; ?> <i class="fas fa-percent"></i> </p>
                </div>
                <div class="col-md-1">
                    <p class=""><?php echo $property->convertUnixTimeToDate($property->expiration)   ;?></p>
                </div>
                <div class="col-md-3">
                    <div class="property-action-buttons">
                        <a href="" class="property-button-view">View listing</a>
                        <a href="edit_property_type.php?id=<?php echo $property->id; ?>" class="property-button-edit"><i class="far fa-edit"></i></a>
                        <a href="delete_property.php?id=<?php echo $property->id; ?>" class="property-button-delete"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



<?php include("includes/footer.php"); ?>
