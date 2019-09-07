

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
            $property->finishCreatingCommercialSpace();
            $property->propertyExpiration($property->expiration);
            $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id );
            $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);
            redirect("edit_property_type.php?id={$property->id}");
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }



}

?>

                <form action="" enctype="multipart/form-data" method="post">
                    <div class="col-md-6 col-md-offset-3">
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
                                <option value="open space" selected>open space</option>
                                <option value="compartimentat">compartimentat</option>
                                <option value="partial compartimentat">partial compartimentat</option>
                                <option value="flexibil">flexibil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rooms">Rooms</label>
                            <select name="rooms" class="form-control">
                                <option value="1" selected>1 Room</option>
                                <option value="2">2 Camere</option>
                                <option value="3">3 Camere</option>
                                <option value="4">4 Camere</option>
                                <option value="5">4+ Camere</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <select name="floor" class="form-control">
                                <option value="1" >1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" >4</option>

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
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="submit" value="CREATE COMMERCIAL SPACE" name="submit" class="btn btn-primary pull-right" >
                        </div>

                    </div>
<?php var_dump($photo->errors); ?>
                </form>