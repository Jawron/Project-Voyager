

<?php
echo "<h1>spatiu comercial</h1>";
?>







<?php

$existing_property = Property::findById($_GET['id']);
$existing_photo = Photo::findById($_GET['id']);
echo $existing_property->category_id;

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
        if(empty($property->errors) === true || empty($photo->errors) === true){
            $property->finishCreatingProperty();
            $property->propertyExpiration($property->expiration);
            $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id);
            $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);

            //redirect("edit_property_type.php?id={$property->id}");


        } else {
            echo "$property->errors";
            echo "$photo->errors";
            echo "<br> This is the error else";
        }

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }



}

?>

<div class="container">

    <?php $existing_property->getPhotos($_GET['id']); ?>
</div>
<div class="container">
    <?php echo $existing_property->address;?><br>
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="600" height="500" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=<?php echo $existing_property->address;?>&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.emojilib.com">list of star names</a>
        </div>
        <style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}
            .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}
        </style>
    </div>
</div>

<form action="" enctype="multipart/form-data" method="post">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <label for="file_upload">Image Upload</label>
            <input type="file" multiple name="upload[]" class="form-control" id="upload" >
        </div>
        <div class="form-group">
            <label for="featured">featured</label>
            <input type="file" name="featured" class="form-control" >
        </div>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $existing_property->title;?>">
        </div>
        <div class="form-group">
            <label for="bathrooms">Category</label>
            <select name="category" class="form-control">
                <option selected value="<?php echo $existing_property->category_id;?>"><?php echo $existing_property->getCategory($existing_property->category_id);?></option>

                <?php $property->getCategories(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="surface">Surface</label>
            <input type="text" name="surface" class="form-control" value="<?php echo $existing_property->surface;?>">
        </div>
        <div class="form-group">
            <label for="expiration">Keep Alive</label>
            <p>Time remaining:<?php echo $existing_property->convertUnixTimeToDate($existing_property->expiration)   ;?></p>
            <p>Time remaining:<?php echo ($existing_property->expiration - date('U'))/60/60/24;?></p>
            <select name="expiration" class="form-control">
                <option selected value="<?php echo ($existing_property->expiration - date('U'))/60/60/24;?>" selected><?php echo $existing_property->getRemainingExpirationTime($existing_property->expiration) ?></option>
                <option value="240" >10 Days</option>
                <option value="720">30 Days</option>
                <option value="1440">60 Days</option>
            </select>
        </div>
        <div class="form-group">
            <label for="transaction">Transaction</label>
            <select name="transaction" class="form-control">
                <option value="<?php echo $existing_property->transaction;?>" selected ><?php echo $existing_property->transaction;?></option>
                <option value="rent">Rent</option>
                <option value="sale">Sale</option>
            </select>
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
                <option value="<?php echo $existing_property->rooms;?>" selected><?php echo $existing_property->rooms;?> Room/Rooms</option>
                <option value="1" >1 Room</option>
                <option value="2">2 Camere</option>
                <option value="3">3 Camere</option>
                <option value="4">4 Camere</option>
                <option value="5">4+ Camere</option>
            </select>
        </div>
        <div class="form-group">
            <label for="floor">Floor</label>
            <select name="floor" class="form-control">
                <option value="<?php echo $existing_property->floor;?>" selected><?php echo $existing_property->floor;?></option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4" >4</option>

            </select>
        </div>
        <div class="form-group">
            <label for="construction_year">Construction Year</label>
            <select name="construction_year" class="form-control">
                <option value="<?php echo $existing_property->construction_year;?>" selected><?php echo $existing_property->construction_year;?></option>
                <option value="mai nou de 2000">mai nou de 2000</option>
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
        <div class="form-group">
            <label for="commission">Commission</label>
            <input type="text" name="commission" class="form-control" value="<?php echo $existing_property->commission;?>">
        </div>
        <div class="form-group">
            <label for="contact_number">Phone Number</label>
            <input type="text" name="contact_number" class="form-control" value="<?php echo $existing_property->contact_number;?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $existing_property->description;?>">
        </div>
        <div class="form-group">
            <input type="submit" id='submit' value="CREATE COMMERCIAL SPACE" name="submit" class="btn btn-primary pull-right" >
        </div>

    </div>
    <?php var_dump($photo->errors); ?>
</form>