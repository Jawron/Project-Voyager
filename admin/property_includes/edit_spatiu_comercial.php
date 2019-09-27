
<h5>Edit Commercial Space</h5>






<?php

$existing_property = Property::findById($_GET['id']);
$existing_photo = Photo::findById($_GET['id']);
$photo = new Photo();
$property = new Property();
if(isset($_POST['submit'])){
    $property->id = $_GET['id'];
    $property->date_created = date("Y-m-d H:i:s");
    $property->expiration = $_POST['expiration'];
    $property->transaction = $_POST['transaction'];
    $property->title = $_POST['title'];
    $property->rooms = $_POST['rooms'];
    $property->category_id = $_POST['category'];
    $property->partitions = $_POST['partitions'];
    $property->floor = $_POST['floor'];
    $property->surface = $_POST['surface'];
    $property->price = $_POST['price'];
    $property->commission = $_POST['commission'];
    $property->address = $_POST['address'];
    $property->construction_year = $_POST['construction_year'];
    $property->description = $_POST['description'];
    $property->contact_number = $_POST['contact_number'];
    try {

            $property->finishCreatingCommercialSpace();
            $property->propertyExpiration($property->expiration);

                $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);
                $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id);

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


<div class="row">
    <div class="container-fluid">
        <div class="header-title-container">
            <h1><?php echo $existing_property->title;?></h1>
        </div>
    </div>
</div>
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
                    <option value="open space">open space</option>
                    <option value="compartimentat">compartimentat</option>
                    <option value="partial compartimentat">partial compartimentat</option>
                    <option value="flexibil">flexibil</option>
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
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $existing_property->price;?>">
            </div>

        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <label for="commission">Commission</label>
                <input type="text" name="commission" class="form-control" value="<?php echo $existing_property->commission;?>">
            </div>
            <div class="form-group">
                <label for="contact_number">Phone Number</label>
                <input type="text" name="contact_number" class="form-control" value="<?php echo $existing_property->contact_number;?>">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">BIo</label><br>
                <textarea cols="120" name="description" rows="10" type="text" ><?php echo $existing_property->description;?></textarea>
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