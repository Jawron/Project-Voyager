<?php

?>


<?php

$photo = new Photo();
$property = new Property();
global $session;
if(isset($_POST['submit'])){
    $property->id = $_GET['id'];
    $property->date_created = date("Y-m-d H:i:s");
    $property->expiration = $_POST['expiration'];
    $property->transaction = $_POST['transaction'];
    $property->title = $_POST['title'];
    $property->rooms = $_POST['rooms'];
    $property->category_id = $_POST['category'];
    $property->total_floors = $_POST['total_floors'];
    $property->partitions = $_POST['partitions'];
    $property->orientation = $_POST['orientation'];
    $property->bathrooms = $_POST['bathrooms'];
    $property->floor = $_POST['floor'];
    $property->surface = $_POST['surface'];
    $property->price = $_POST['price'];
    $property->commission = $_POST['commission'];
    $property->address = $_POST['address'];
    $property->construction_year = $_POST['construction_year'];
    $property->description = $_POST['description'];
    $property->contact_number = $_POST['contact_number'];
    $property->comfort = $_POST['comfort'];
    if(!empty($_POST['options'])){
        $property->options = $_POST['options'];
    }
    try {
            $property->finishCreatingApartment();
            $property->propertyExpiration($property->expiration);
            $property->setOptions();
            $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id );
            $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);
            $session->message("Property successfully created!");
            redirect("edit_property_type.php?id={$property->id}");
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }



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
<style>
    .property-custom-css > .nav-item{
        background-color: transparent;
        text-align: center;
        color: #1d2124;
    }
    .property-custom-css > .nav-item .nav-link{
        background-color: rgba(239,154,154 ,1);
        color: #1d2124;
        border-radius: 0;
        font-weight: 500;
    }
    .property-custom-css .nav-item .active{
        background-color: rgba(198,40,40 ,1);
        color: #fff;
        font-weight: 600;
    }
    .property-custom-css .nav-item .active::before{
        content: '';
        width: 10px;
        height: 10px;
        background-color: #fff;
        position: absolute;
        left: 30px;
        top: 14px;
        border-radius: 50%;
        border: 1px solid #fff;
    }
    .property-custom-css .nav-item .active::after{
        content: '';
        width: 10px;
        height: 10px;
        position: absolute;
        background-color: transparent;
        top: 27px;
        left: 48%;
        border-left: 2px solid #fff;
        border-bottom: 2px solid #fff;
        transform: rotate(-45deg);

    }
    .next-tab{
        padding: 10px 30px;
        background-color: rgba(198,40,40 ,1);
        color: white !important;
        float: right;
        font-weight: 700;
        transition: 0.7s;
    }
    .next-tab:hover{
        background-color: rgba(198,40,40 ,0.7);
    }
    .previous-tab{
        padding: 10px 30px;
        background-color: rgba(198,40,40 ,1);
        color: white !important;
        font-weight: 700;
        transition: 0.7s;
    }
    .previous-tab:hover{
        background-color: rgba(198,40,40 ,0.7);
    }





    /* The container */
    .checkbox-custom {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 1em;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .checkbox-custom input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: rgba(158,158,158 ,1);
    }

    /* On mouse-over, add a grey background color */
    .checkbox-custom:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .checkbox-custom input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkbox-custom input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkbox-custom .checkmark:after {
        left: 7px;
        top: 4px;
        width: 6px;
        height: 11px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('#file-css-upload-1').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-1').text(fileName);
        });
        $('#file-css-upload-2').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-2').text(fileName);
        });
        $('#file-css-upload-3').change(function(e){
            var fileName = e.target.files[0].name;
            $('.file-upload-text-3').text(fileName);
        });

    });
</script>
<br>
<br>
<br>
<br>

<form action="" enctype="multipart/form-data" method="post">
    <ul class="nav nav-pills mb-3 property-custom-css" id="pills-tab" role="tablist">
        <li class="nav-item col-md-3 col-xs-12">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-info" role="tab" aria-controls="pills-home" aria-selected="true">Property Information</a>
        </li>
        <li class="nav-item col-md-3 col-xs-12">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-images" role="tab" aria-controls="pills-profile" aria-selected="false">Upload images</a>
        </li>
        <li class="nav-item col-md-3 col-xs-12">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-contact" aria-selected="false">Finishing  Details</a>
        </li>
        <li class="nav-item col-md-3 col-xs-12">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-options" role="tab" aria-controls="pills-contact" aria-selected="false">Extra options</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3>Property Information</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            <?php $property->getCategories(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiration">Keep Alive</label>
                        <select name="expiration" class="form-control">
                            <option value="240" selected>10 Days</option>
                            <option value="720">30 Days</option>
                            <option value="1440">60 Days</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transaction">Transaction</label>
                        <select name="transaction" class="form-control">
                            <option value="rent" selected>Rent</option>
                            <option value="rent">Rent</option>
                            <option value="sale">Sale</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="contact_number">Phone Number</label>
                        <input type="text" name="contact_number" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="commission">Commission</label>
                        <input type="text" name="commission" class="form-control" >
                    </div>
                </div>
                <div class="col-md-12">
                    <a class="next-tab" >Next <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-images" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h3>Upload images</h3>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label >Upload a photo</label>
                    <label class="label-css" for="file-css-upload-2">
                        <span class="file-upload-text-2">File upload</span>
                        <span class="button-file-upload-2"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                    </label>
                    <input type="file" multiple name="upload[]" id="file-css-upload-2" class="upload-field-css" >

                    <label >Upload a featured photo</label>
                    <label class="label-css" for="file-css-upload-3">
                        <span class="file-upload-text-3">File upload</span>
                        <span class="button-file-upload-3"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                    </label>
                    <input type="file"  name="featured" id="file-css-upload-3" class="upload-field-css" >
                </div>
            </div>
            <a class="next-tab" id="pills-profile-tab" >Next</a>
            <a class="previous-tab" id="pills-profile-tab" >Previous</a>
        </div>
        <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h3>Finishing Details</h3>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="surface">Surface</label>
                        <input type="text" name="surface" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <select name="rooms" class="form-control">
                            <option value="1" selected>Garsoniera</option>
                            <option value="2">2 Camere</option>
                            <option value="3">3 Camere</option>
                            <option value="4">4 Camere</option>
                            <option value="5">4+ Camere</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="construction_year">Construction Year</label>
                        <select name="construction_year" class="form-control">
                            <option value="mai nou de 2000" selected>mai nou de 2000</option>
                            <option value="1990-2000">1990-2000</option>
                            <option value="1977-1990">1977-1990</option>
                            <option value="1941-1977">1941-1977</option>
                            <option value="mai vechi de 1941">mai vechi de 1941</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_floors">Total Floors</label>
                        <input type="text" name="total_floors" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="orientation">Orientation</label>
                        <input type="text" name="orientation" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="partitions">Partition</label>
                        <select name="partitions" class="form-control">
                            <option value="decomandat" selected>decomandat</option>
                            <option value="semidecomandat">semidecomandat</option>
                            <option value="nedecomandat">nedecomandat</option>
                            <option value="circular">circular</option>
                            <option value="vagon">vagon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <select name="floor" class="form-control">
                            <option value="parter" selected>Parter</option>
                            <option value="demisol">Demisol</option>
                            <option value="masarda">Masarda</option>
                            <option value="1" >1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" >4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7" >7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comfort">Comfort</label>
                        <select name="comfort" class="form-control">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="lux">Lux</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <select name="bathrooms" class="form-control">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="description">Property Description</label>
                        <textarea cols="20" rows="6" name="description" type="text" style="width: 100%"></textarea>
                    </div>
                </div>
            </div>



            <a class="previous-tab" id="pills-profile-tab" >Previous</a>
            <a class="next-tab" id="pills-profile-tab" >Next</a>

        </div>
        <div class="tab-pane fade" id="pills-options" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h3>Extra  options</h3>
            <div class="form-group">
                <h5>Imprejurimi</h5>
                <div class="row">

                    <div class="col-md-4">
                        <label class="checkbox-custom">Scoli
                            <input type="checkbox" name="options[]" value="Scoli">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Restaurante
                            <input type="checkbox" name="options[]" value="Restaurante">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Zone Verzi
                            <input type="checkbox" name="options[]" value="Zone Verzi">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Transport Public
                            <input type="checkbox" name="options[]" value="Transport Public">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Farmacii
                            <input type="checkbox" name="options[]" value="Farmacii">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Zone Comerciale
                            <input type="checkbox" name="options[]" value="Zone Comerciale">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <ul class="add-property-info">
                    <li><i class="fas fa-info-circle"></i> Toate optiunile de mai sus se refera la o raza de 1km.</li>
                </ul>


                <h5>Infrastructura</h5>
                <div class="row">
                    <div class="col-md-4">
                        <label class="checkbox-custom">Lift
                            <input type="checkbox" name="options[]" value="Lift">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Electricitate
                            <input type="checkbox" name="options[]" value="Electricitate">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Canalizare
                            <input type="checkbox" name="options[]" value="Canalizare">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Spatii de Joaca
                            <input type="checkbox" name="options[]" value="Spatii de Joaca">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Apa Curenta
                            <input type="checkbox" name="options[]" value="Apa Curenta">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Asamblu rezidential cu access securizat
                            <input type="checkbox" name="options[]" value="Asamblu rezidential cu access securizat">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>


                <h5>Comoditati</h5>
                <div class="row">
                    <div class="col-md-4">
                        <label class="checkbox-custom">Centrala Termica
                            <input type="checkbox" name="options[]" value="Centrala Termica">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Mobilat
                            <input type="checkbox" name="options[]" value="Mobilat">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Aer Conditionat
                            <input type="checkbox" name="options[]" value="Aer Conditionat">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Parcare Masina
                            <input type="checkbox" name="options[]" value="Parcare Masina">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Fibra Optica
                            <input type="checkbox" name="options[]" value="Fibra Optica">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Conducta Gaze
                            <input type="checkbox" name="options[]" value="Conducta Gaze">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>


                <h5>Particularitati</h5>
                <div class="row">
                    <div class="col-md-4">
                        <label class="checkbox-custom">Spatiu de Depozitare
                            <input type="checkbox" name="options[]" value="Spatiu de Depozitare">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Balcon inchis
                            <input type="checkbox" name="options[]" value="Balcon inchis">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Anexa
                            <input type="checkbox" name="options[]" value="Anexa">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Balcon
                            <input type="checkbox" name="options[]" value="Balcon">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Bucatatie utilata
                            <input type="checkbox" name="options[]" value="Bucatatie utilata">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Dormitor Matrimonial
                            <input type="checkbox" name="options[]" value="Dormitor Matrimonial">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>


                <h5>Siguranta</h5>
                <div class="row">
                    <div class="col-md-4">
                        <label class="checkbox-custom">Supraveghere 24/7
                            <input type="checkbox" name="options[]" value="Supraveghere 24/7">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Detector Gaze
                            <input type="checkbox" name="options[]" value="Detector Gaze">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Supraveghere Video
                            <input type="checkbox" name="options[]" value="Supraveghere Video">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Usa Blindata
                            <input type="checkbox" name="options[]" value="Usa Blindata">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox-custom">Sistem de Alarma
                            <input type="checkbox" name="options[]" value="Sistem de Alarma">
                            <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-custom">Videointerfon
                            <input type="checkbox" name="options[]" value="Videointerfon">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>








<!---->
<!--                <label class="checkbox-custom">Two-->
<!--                    <input type="checkbox" name="options[]" value="">-->
<!--                    <span class="checkmark"></span>-->
<!--                </label>-->
<!--                <label class="checkbox-custom">Two-->
<!--                    <input type="checkbox" name="options[]" value="">-->
<!--                    <span class="checkmark"></span>-->
<!--                </label>-->
<!--                <label class="checkbox-custom">Two-->
<!--                    <input type="checkbox" name="options[]" value="">-->
<!--                    <span class="checkmark"></span>-->
<!--                </label>-->
<!--                <label class="checkbox-custom">Two-->
<!--                    <input type="checkbox" name="options[]" value="">-->
<!--                    <span class="checkmark"></span>-->
<!--                </label>-->
<!---->
<!---->
<!---->
<!---->
<!--                <label for="options">options</label>-->
<!--                <input type="checkbox" name="options[]" value="Daily">Daily<br>-->
<!--                <input type="checkbox" name="options[]" value="Sunday">Sunday<br>-->
<!--                <input type="checkbox" name="options[]" value="Monday">Monday<br>-->
<!--                <input type="checkbox" name="options[]" value="Tuesday">Tuesday <br>-->
<!--                <input type="checkbox" name="options[]" value="Wednesday">Wednesday<br>-->
<!--                <input type="checkbox" name="options[]" value="Thursday">Thursday <br>-->
<!--                <input type="checkbox" name="options[]" value="Friday">Friday<br>-->
<!--                <input type="checkbox" name="options[]" value="Saturday">Saturday <br>-->
            </div>
            <a class="previous-tab" id="pills-profile-tab" >Previous</a>
<br>
<br>
<br>
            <div class="form-group">
                <input type="submit" value="save the property" name="submit" class="button-save-submit" >
            </div>
        </div>
    </div>

</form>











<script>
    jQuery(document).ready(function ($) {

        $('.next-tab').click(function () {
            $('.nav-pills > .nav-item > .active').parent().next('li').find('a').trigger('click');
        });

        $('.previous-tab').click(function () {
            $('.nav-pills > .nav-item > .active').parent().prev('li').find('a').trigger('click');
        });
    })
</script>
























<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!--<h1>apartament</h1>-->
<!---->
<!--<form action="" enctype="multipart/form-data" method="post">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6">-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    -->
<!--                </form>-->