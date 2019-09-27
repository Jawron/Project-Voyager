

<?php
echo "<h1>spatiu comercial</h1>";
?>







<?php


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
        if(!empty($_POST['title']) && !empty($_POST['price']) && !empty($_POST['contact_number'])){
            $property->finishCreatingCommercialSpace();
            $property->propertyExpiration($property->expiration);
            $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id );
            $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);
            $session->message("Property successfuly created");
            redirect("edit_property_type.php?id={$property->id}");
        } else {
            echo "
                <br>
                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                  <strong>Attention!</strong> You should check in on some of those fields below.Complete all of the required fields.
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                  </button>
                </div>
                ";
        }



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
<h6>Property type: House</h6>
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
                            <option value="1" selected>1 Camera</option>
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

                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="partitions">Partition</label>
                        <select name="partitions" class="form-control">
                            <option value="open space" selected>open space</option>
                            <option value="compartimentat">compartimentat</option>
                            <option value="partial compartimentat">partial compartimentat</option>
                            <option value="flexibil">flexibil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="floor">Floors</label>
                        <select name="floor" class="form-control">
                            <option value="1" >1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" >4</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" >
                    </div>
                </div>
            </div>



            <a class="previous-tab" id="pills-profile-tab" >Previous</a>
            <a class="next-tab" id="pills-profile-tab" >Next</a>

        </div>
        <div class="tab-pane fade" id="pills-options" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h3>Description</h3>
            <div class="form-group">

                <div class="col-md-12">

                    <div class="form-group">
                        <label for="description">Property Description</label>
                        <textarea cols="20" rows="6" name="description" type="text" style="width: 100%"></textarea>
                    </div>
                </div>




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




































<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--                <form action="" enctype="multipart/form-data" method="post">-->
<!--                    <div class="col-md-6 col-md-offset-3">-->
<!--                        <div class="form-group">-->
<!--                            <label for="file_upload">Image Upload</label>-->
<!--                            <input type="file" multiple name="upload[]" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="featured">featured</label>-->
<!--                            <input type="file" name="featured" class="form-control" >-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="surface">Surface</label>-->
<!--                            <input type="text" name="surface" class="form-control" >-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="partitions">Partition</label>-->
<!--                            <select name="partitions" class="form-control">-->
<!--                                <option value="open space" selected>open space</option>-->
<!--                                <option value="compartimentat">compartimentat</option>-->
<!--                                <option value="partial compartimentat">partial compartimentat</option>-->
<!--                                <option value="flexibil">flexibil</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="rooms">Rooms</label>-->
<!--                            <select name="rooms" class="form-control">-->
<!--                                <option value="1" selected>1 Room</option>-->
<!--                                <option value="2">2 Camere</option>-->
<!--                                <option value="3">3 Camere</option>-->
<!--                                <option value="4">4 Camere</option>-->
<!--                                <option value="5">4+ Camere</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="floor">Floor</label>-->
<!--                            <select name="floor" class="form-control">-->
<!--                                <option value="1" >1</option>-->
<!--                                <option value="2">2</option>-->
<!--                                <option value="3">3</option>-->
<!--                                <option value="4" >4</option>-->
<!---->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="construction_year">Construction Year</label>-->
<!--                            <select name="construction_year" class="form-control">-->
<!--                                <option value="mai nou de 2000" selected>mai nou de 2000</option>-->
<!--                                <option value="1990-2000">1990-2000</option>-->
<!--                                <option value="1977-1990">1977-1990</option>-->
<!--                                <option value="1941-1977">1941-1977</option>-->
<!--                                <option value="mai vechi de 1941">mai vechi de 1941</option>-->
<!---->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="price">Price</label>-->
<!--                            <input type="text" name="price" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="commission">Commission</label>-->
<!--                            <input type="text" name="commission" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="contact_number">Phone Number</label>-->
<!--                            <input type="text" name="contact_number" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="address">Address</label>-->
<!--                            <input type="text" name="address" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <label for="description">Description</label>-->
<!--                            <input type="text" name="description" class="form-control" >-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="submit" value="CREATE COMMERCIAL SPACE" name="submit" class="btn btn-primary pull-right" >-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<?php //var_dump($photo->errors); ?>
<!--                </form>-->