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
$footer = new FooterClass();
if(isset($_POST['submit_footer_type'])){
    $footer->type = $_POST['type'];
    $footer->saveFooterType();
    $session->message("Settings Updated");
}
 $slider_active = new Slider();


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

<style>

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="settings-slider">
                <h3>Change the slider settings</h3>
                <p>Current slider: <span><a href="choose_slider.php"><?php $slider_active->returnActiveSlider();?> <i class="far fa-edit"></i></a></span></p>
                <a href="choose_slider.php" class="change-slider-btn">Change the slider</a>
                <a href="create_slider.php" class="create-slider-btn">Create a new one</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="settings-footer">
                <h3>Set the footer columns and information</h3>
                <ul class="add-property-info">
                    <li><i class="fas fa-info-circle"></i> Select the footer type you desire, one column,two column etc.</li>
                    <li><i class="fas fa-info-circle"></i> After selecting the type you want press "Save footer type".</li>
                    <li><i class="fas fa-info-circle"></i> After saving complete the fields with information and press "Save".</li>
                    <li><i class="fas fa-info-circle"></i> All fields accepts html encoding.</li>
                </ul>
                <form action=""  method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group " >
                                <select name="type" id="single" class="form-control w-100">
                                    <option value="one_column">One Column</option>
                                    <option value="two_column">Two Column</option>
                                    <option value="three_column">Three Column</option>
                                    <option value="four_column">Four Column</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Save footer type" name="submit_footer_type" class="btn footer_type_btn w-100" >

                        </div>
                    </div>
                </form>
                <div class="" id="footer-selection">
                    <?php $footer->getType($footer->findTypeDb());?>
                </div>

            </div>
        </div>
    </div>
</div>






<?php include("includes/footer.php"); ?>