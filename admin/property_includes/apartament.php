<?php
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
            redirect("edit_property_type.php?id={$property->id}");
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }



}

?>
<h1>apartament</h1>

<form action="" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file_upload">Image Upload</label>
                                <input type="file" multiple name="upload[]" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="featured">featured</label>
                                <input type="file" name="featured" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="title">title</label>
                                <input type="text" name="title" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="bathrooms">Category</label>
                                <select name="category" class="form-control">
                                    <?php $property->getCategories(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="surface">Surface</label>
                                <input type="text" name="surface" class="form-control" >
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
                        <div class="col-md-6">
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
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="commission">Commission</label>
                                <input type="text" name="commission" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Phone Number</label>
                                <input type="text" name="contact_number" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="description">BIo</label>
                                <textarea cols="20" name="description" type="text" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="total_floors">Total Floors</label>
                                <input type="text" name="total_floors" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="orientation">Orientation</label>
                                <input type="text" name="orientation" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="bathrooms">Bathrooms</label>
                                <select name="bathrooms" class="form-control">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="options">options</label>
                                <input type="checkbox" name="options[]" value="Daily">Daily<br>
                                <input type="checkbox" name="options[]" value="Sunday">Sunday<br>
                                <input type="checkbox" name="options[]" value="Monday">Monday<br>
                                <input type="checkbox" name="options[]" value="Tuesday">Tuesday <br>
                                <input type="checkbox" name="options[]" value="Wednesday">Wednesday<br>
                                <input type="checkbox" name="options[]" value="Thursday">Thursday <br>
                                <input type="checkbox" name="options[]" value="Friday">Friday<br>
                                <input type="checkbox" name="options[]" value="Saturday">Saturday <br>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create a Motherfucker" name="submit" class="btn btn-primary pull-right" >
                    </div>
                </form>