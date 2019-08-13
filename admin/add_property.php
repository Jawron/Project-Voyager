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


<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Add a property
                    <small>Subheading</small>
                </h1>
                <?php echo $session_message;?>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="type">Rooms</label>
                        <select name="type" class="form-control">
                            <option value="apartament" selected>Apartament</option>
                            <option value="apartament">Apartament</option>
                            <option value="casa">Casa</option>
                            <option value="teren">Teren</option>
                            <option value="spatiu comercial">Spatiu Comercial</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create a Motherfucker" name="submit" class="btn btn-primary pull-right" >
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
<h1>test</h1>







<?php include("includes/footer.php"); ?>
