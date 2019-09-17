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

$sliders = Slider::findAll();

?>
<?php
$choose_slider = new Slider();
if(isset($_POST['submit'])){
    $main_slider = $_POST['main_slider'];
    $choose_slider->setMainSlider($main_slider);
    $session->message("Settings Updated");
    redirect("settings.php");
}
?>
<style>
    .settings-choose-slider{
        background-color: #fff;
        border:1px solid rgba(189,189,189 ,0.5);
        border-radius: 7px;
        padding:15px 15px 15px 30px;
        box-shadow: rgba(189,189,189 ,0.5) 0px 1px 6px;
        margin: 7px 0;
    }



    .inputGroup {
        background-color: #fff;
        display: block;
        margin: 6px 0;
        position: relative;
        box-shadow: rgba(104,118,138 ,0.5) 0px 1px 0px;
    }
    .inputGroup label {
        padding: 12px 30px;
        width: 100%;
        display: block;
        text-align: left;
        color: #3c454c;
        cursor: pointer;
        position: relative;
        z-index: 2;
        transition: color 200ms ease-in;
        overflow: hidden;
    }
    .inputGroup label:before {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        content: '';
        background-color: rgba(0,99,177 ,1);
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        z-index: -1;
    }
    .inputGroup label:after {
        width: 32px;
        height: 32px;
        content: '';
        border: 2px solid #d1d7dc;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
        background-repeat: no-repeat;
        background-position: 2px 3px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        transition: all 200ms ease-in;
    }
    .inputGroup input[type='radio']:checked ~ label {
        color: #fff;
    }
    .inputGroup input[type='radio']:checked ~ label:before {
        transform: translate(-50%, -50%) scale(100, 100);
        opacity: 1;
        overflow: hidden;
    }
    .inputGroup input[type='radio']:checked ~ label:after {
        background-color: rgba(3,131,135 ,1);
        border-color: rgba(3,131,135 ,1);
    }
    .inputGroup input[type='radio'] {
        width: 32px;
        height: 32px;
        order: 1;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        visibility: hidden;
    }
    .id_span_slider{
        margin-top:6px;
        float: left;
        margin-left: -40px;
        height: 30px;
        width: 30px;
        padding:3px;
        text-align: center;
        font-weight: 700;
        border-radius: 100%;
        background-color: rgba(3,131,135 ,1);
        color: #fff;
    }
    .form-check-label{
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 settings-choose-slider">
            <h2>Choose the slider you wish</h2>
            <ul class="add-property-info">
                <li><i class="fas fa-info-circle"></i> Changing this option will affect the slider from Front-Page</li>
                <li><i class="fas fa-info-circle"></i> Make sure the slider is filled with images..</li>
                <li><i class="fas fa-info-circle"></i> After deciding what slider to choose press "Save".</li>
            </ul>

            <div class="row">
                <div class="col-md-10 offset-1 col-xs-12 offset-xs-0">
                    <h5 style="text-decoration: underline">Select a Slider:</h5>
                    <form action="" enctype="multipart/form-data" method="post">
                        <?php foreach ($sliders as $slider) { ?>
                           <span class ="id_span_slider" style=""><?php echo  $slider->id;?></span>
                            <div class="form-group inputGroup">
                                <?php $slider_id = rand(0,10000);?>

                                <input class="form-check-input" type="radio" name="main_slider" id="<?php echo $slider_id?>" value="<?php echo $slider->title;?>">
                                <label class="form-check-label" for="<?php echo $slider_id?>"><?php echo $slider->title;?></label>
                            </div>
                        <?php } ?>
                        <div class="form-group" style="margin-top: 60px">
                            <input type="submit" value="Save" name="submit" class="btn footer_type_btn w-100" >
                        </div>
                    </form>
                    <ul class="add-property-info">
                        <li><i class="fas fa-info-circle"></i> After saving you will be redirected to the settings page</li>
                        <li><i class="fas fa-info-circle"></i> To view changes please go to the front page</li>
                        <li><i class="fas fa-info-circle"></i> By clicking the above button you agree with our <a href="">Terms & Conditions</a>.</li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>
