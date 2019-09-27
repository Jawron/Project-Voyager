<?php include("includes/header.php"); ?>
<?php include("includes/main-nav.php"); ?>
<?php $properties = new Property(); ?>

<div class="container-fluid" style="background-color: white">
    <h1 style="padding: 30px;margin-bottom:15px;text-align: center;font-weight: 900">All Properties!</h1>
</div>


<div class="container">
    <div class="row" style="border-top: 3px solid darkred;padding-top: 30px">
        <?php
        $properties->getAllProperties(99999);
        ?>
    </div>
</div>




















<?php include("includes/footer.php"); ?>