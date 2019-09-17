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


$slider = new Slider();

if(isset($_POST['submit'])){

    $slider->title = $_POST['title'];
    $slider->id = $id;
    $slider->createSlider();
    $session->message("Slider Created");
    redirect("add_slider.php?id={$slider->getLastInsertedSlider($slider->id)}");

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
</div><!--  end container alert  -->



<div class="container">
    <div class="row">
        <div class="add-property-logo">
            <i class="fas fa-plus-circle add-property-logo-styled" style=""></i>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 offset-3 offset-xs-0">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" multiple name="title" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Create" name="submit" class="button-save-submit" >
                    </div>
                </form>
                <ul class="add-property-info">
                    <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                    <li><i class="fas fa-info-circle"></i> This will create a slider and will take you to customize it.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>













<?php include("includes/footer.php"); ?>
