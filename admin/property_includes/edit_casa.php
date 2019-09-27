<?php
?>


<?php

$photo = new Photo();
$property = new Property();

$existing_property = Property::findById($_GET['id']);
$existing_photo = Photo::findById($_GET['id']);
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
        global $session;
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



}?>
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
<h5>Edit House</h5>
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

<div class="row">
    <div class="container-fluid">
            <div class="header-title-container">
                <h1><?php echo $existing_property->title;?></h1>
            </div>
    </div>
</div>

<form action="" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $existing_property->title;?>">
            </div>
            <div class="form-group">
                <label >Upload a photo</label>
                <label class="label-css" for="file-css-upload-2">
                    <span class="file-upload-text-2">File upload</span>
                    <span class="button-file-upload-2"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                </label>
                <input type="file" multiple name="upload[]" id="file-css-upload-2" class="upload-field-css" >
            </div>
            <div class="form-group">
                <label >Upload a featured photo</label>
                <label class="label-css" for="file-css-upload-3">
                    <span class="file-upload-text-3">File upload</span>
                    <span class="button-file-upload-3"><i class="fas fa-cloud-upload-alt"></i> Browse</span>
                </label>
                <input type="file"  name="featured" id="file-css-upload-3" class="upload-field-css" >
            </div>
            <div class="form-group">
                <label for="expiration">Keep Alive</label>
                <p>Expires on:<?php echo $existing_property->convertUnixTimeToDate($existing_property->expiration)   ;?></p>
<!--                <p>Time remaining:--><?php //echo ($existing_property->expiration - date('U'))/60/60/24;?><!--</p>-->
                <p>Time remaining:<?php echo $existing_property->getRemainingExpirationTime($existing_property->expiration); ?></p>
                <select name="expiration" class="form-control">
                    <option selected value="<?php echo ($existing_property->expiration - date('U'))/60/60;?>" selected><?php echo $existing_property->getRemainingExpirationTime($existing_property->expiration) ?></option>
                    <option value="240" >10 Days</option>
                    <option value="720">30 Days</option>
                    <option value="1440">60 Days</option>
                </select>
            </div>
            <div class="form-group">
                <label for="transaction">Transaction</label>
                <select name="transaction" class="form-control">
                    <option value="<?php echo $existing_property->transaction;?>" selected><?php echo $existing_property->transaction;?></option>
                    <option value="rent">Rent</option>
                    <option value="sale">Sale</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="edit-property-images-list">

                <?php $existing_property->getPhotosNames($_GET['id']);?>

                <button type="button" class="see-all-images" data-toggle="modal" data-target="#show-all-images-edit">
                    See all Images <i class="fas fa-arrow-circle-right"></i>
                </button>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $existing_property->address;?>">
            </div>
            <div class="form-group">
                <label for="bathrooms">Category</label>
                <?php echo $existing_property->category_id;?>
                <select name="category" class="form-control">
                    <option label="" value="<?php echo $existing_property->category_id;?>" selected ><?php echo $existing_property->getCategory($existing_property->category_id);?></option>
                    <?php $property->getCategories(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="surface">Surface</label>
                <input type="text" name="surface" class="form-control" value="<?php echo $existing_property->surface;?>">
            </div>

            <div class="form-group">
                <label for="partitions">Partition</label>
                <select name="partitions" class="form-control">
                    <option value="<?php echo $existing_property->partitions;?>" selected><?php echo $existing_property->partitions;?></option>
                    <option value="decomandat">decomandat</option>
                    <option value="semidecomandat">semidecomandat</option>
                    <option value="nedecomandat">nedecomandat</option>
                    <option value="circular">circular</option>
                    <option value="vagon">vagon</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rooms">Rooms</label>
                <select name="rooms" class="form-control">
                    <option value="<?php echo $existing_property->rooms;?>" selected ><?php echo $existing_property->rooms;?></option>
                    <option value="1" >1 Camera</option>
                    <option value="2">2 Camere</option>
                    <option value="3">3 Camere</option>
                    <option value="4">4 Camere</option>
                    <option value="5">4+ Camere</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            Adress: <?php echo $existing_property->address;?><br>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="450" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=<?php echo $existing_property->address;?>&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                <style>.mapouter{position:relative;height:500px;width:100%;}
                    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
                </style>
            </div>
        </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="floor">Floor</label>
                <select name="floor" class="form-control">
                    <option value="<?php echo $existing_property->floor;?>" selected ><?php echo $existing_property->floor;?></option>
                    <option value="parter" >Parter</option>
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
                <label for="construction_year">Construction Year</label>
                <select name="construction_year" class="form-control">
                    <option value="<?php echo $existing_property->construction_year;?>" selected ><?php echo $existing_property->construction_year;?></option>
                    <option value="mai nou de 2000" >mai nou de 2000</option>
                    <option value="1990-2000">1990-2000</option>
                    <option value="1977-1990">1977-1990</option>
                    <option value="1941-1977">1941-1977</option>
                    <option value="mai vechi de 1941">mai vechi de 1941</option>

                </select>
            </div>
            <div class="form-group">
                <label for="comfort">Comfort</label>
                <select name="comfort" class="form-control">
                    <option value="<?php echo $existing_property->comfort;?>" selected ><?php echo $existing_property->comfort;?></option>
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="lux">Lux</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $existing_property->price;?>">
            </div>
            <div class="form-group">
                <label for="commission">Commission</label>
                <input type="text" name="commission" class="form-control" value="<?php echo $existing_property->commission;?>">
            </div>
            <div class="form-group">
                <label for="contact_number">Phone Number</label>
                <input type="text" name="contact_number" class="form-control" value="<?php echo $existing_property->contact_number;?>">
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="description">BIo</label>
                <textarea cols="58" name="description" rows="10" type="text" ><?php echo $existing_property->description;?></textarea>
            </div>
            <div class="form-group" style="margin-top: -6px">
                <label for="total_floors">Total Floors</label>
                <input type="text" name="total_floors" class="form-control" value="<?php echo $existing_property->total_floors;?>" >
            </div>
            <div class="form-group">
                <label for="orientation">Orientation</label>
                <input type="text" name="orientation" class="form-control" value="<?php echo $existing_property->orientation;?>">
            </div>
            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <select name="bathrooms" class="form-control">
                    <option value="<?php echo $existing_property->bathrooms;?>" selected ><?php echo $existing_property->bathrooms;?></option>
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Your Interests are:<?php echo $existing_property->options;?></p>

            <div class="form-group">
                <div class="form-group">
                    <h5>Imprejurimi</h5>
                    <div class="row">

                        <div class="col-md-4">
                            <label class="checkbox-custom">Scoli
                                <input type="checkbox" name="options[]" value="Scoli" <?php echo  $existing_property->optionIsChecked('Scoli',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Restaurante
                                <input type="checkbox" name="options[]" value="Restaurante" <?php echo  $existing_property->optionIsChecked('Restaurante',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Zone Verzi
                                <input type="checkbox" name="options[]" value="Zone Verzi" <?php echo  $existing_property->optionIsChecked('Zone Verzi',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Transport Public
                                <input type="checkbox" name="options[]" value="Transport Public" <?php echo  $existing_property->optionIsChecked('Transport Public',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Farmacii
                                <input type="checkbox" name="options[]" value="Farmacii" <?php echo  $existing_property->optionIsChecked('Farmacii',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Zone Comerciale
                                <input type="checkbox" name="options[]" value="Zone Comerciale" <?php echo  $existing_property->optionIsChecked('Zone Comerciale',$existing_property->options) ;?>>
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
                                <input type="checkbox" name="options[]" value="Lift" <?php echo  $existing_property->optionIsChecked('Lift',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Electricitate
                                <input type="checkbox" name="options[]" value="Electricitate" <?php echo  $existing_property->optionIsChecked('Electricitate',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Canalizare
                                <input type="checkbox" name="options[]" value="Canalizare" <?php echo  $existing_property->optionIsChecked('Canalizare',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Spatii de Joaca
                                <input type="checkbox" name="options[]" value="Spatii de Joaca" <?php echo  $existing_property->optionIsChecked('Spatii de Joaca',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Apa Curenta
                                <input type="checkbox" name="options[]" value="Apa Curenta" <?php echo  $existing_property->optionIsChecked('Apa Curenta',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Asamblu rezidential cu access securizat
                                <input type="checkbox" name="options[]" value="Asamblu rezidential cu access securizat" <?php echo  $existing_property->optionIsChecked('Asamblu rezidential cu access securizat',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>


                    <h5>Comoditati</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="checkbox-custom">Centrala Termica
                                <input type="checkbox" name="options[]" value="Centrala Termica" <?php echo  $existing_property->optionIsChecked('Centrala Termica',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Mobilat
                                <input type="checkbox" name="options[]" value="Mobilat" <?php echo  $existing_property->optionIsChecked('Mobilat',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Aer Conditionat
                                <input type="checkbox" name="options[]" value="Aer Conditionat" <?php echo  $existing_property->optionIsChecked('Aer Conditionat',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Parcare Masina
                                <input type="checkbox" name="options[]" value="Parcare Masina" <?php echo  $existing_property->optionIsChecked('Parcare Masina',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Fibra Optica
                                <input type="checkbox" name="options[]" value="Fibra Optica" <?php echo  $existing_property->optionIsChecked('Fibra Optica',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Conducta Gaze
                                <input type="checkbox" name="options[]" value="Conducta Gaze" <?php echo  $existing_property->optionIsChecked('Conducta Gaze',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>


                    <h5>Particularitati</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="checkbox-custom">Spatiu de Depozitare
                                <input type="checkbox" name="options[]" value="Spatiu de Depozitare" <?php echo  $existing_property->optionIsChecked('Spatiu de Depozitare',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Balcon inchis
                                <input type="checkbox" name="options[]" value="Balcon inchis" <?php echo  $existing_property->optionIsChecked('Balcon inchis',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Anexa
                                <input type="checkbox" name="options[]" value="Anexa" <?php echo  $existing_property->optionIsChecked('Anexa',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Balcon
                                <input type="checkbox" name="options[]" value="Balcon" <?php echo  $existing_property->optionIsChecked('Balcon',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Bucatatie utilata
                                <input type="checkbox" name="options[]" value="Bucatatie utilata" <?php echo  $existing_property->optionIsChecked('Bucatatie utilata',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Dormitor Matrimonial
                                <input type="checkbox" name="options[]" value="Dormitor Matrimonial" <?php echo  $existing_property->optionIsChecked('Dormitor Matrimonial',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>


                    <h5>Siguranta</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="checkbox-custom">Supraveghere 24/7
                                <input type="checkbox" name="options[]" value="Supraveghere 24/7" <?php echo  $existing_property->optionIsChecked('Supraveghere 24/7',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Detector Gaze
                                <input type="checkbox" name="options[]" value="Detector Gaze" <?php echo  $existing_property->optionIsChecked('Detector Gaze',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Supraveghere Video
                                <input type="checkbox" name="options[]" value="Supraveghere Video" <?php echo  $existing_property->optionIsChecked('Supraveghere Video',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Usa Blindata
                                <input type="checkbox" name="options[]" value="Usa Blindata" <?php echo  $existing_property->optionIsChecked('Usa Blindata',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="checkbox-custom">Sistem de Alarma
                                <input type="checkbox" name="options[]" value="Sistem de Alarma" <?php echo  $existing_property->optionIsChecked('Sistem de Alarma',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-custom">Videointerfon
                                <input type="checkbox" name="options[]" value="Videointerfon" <?php echo  $existing_property->optionIsChecked('Videointerfon',$existing_property->options) ;?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <input type="submit" value="Save Changes" name="submit" class="save-changes-btn" >
            </div>
            <div class="col-md-2 col-xs-12" style="padding:10px">
                <a href="delete_property.php?id=<?php echo $existing_property->id; ?>" class="delete-changes-btn">DELETE</a>
            </div>
        </div>
    </div>
</form>











<div class="modal fade" id="show-all-images-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $existing_property->getPhotos($_GET['id']);?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>