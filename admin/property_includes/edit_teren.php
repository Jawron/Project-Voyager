

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
    $property->surface = $_POST['surface'];
    $property->price = $_POST['price'];
    $property->commission = $_POST['commission'];
    $property->address = $_POST['address'];
    $property->description = $_POST['description'];
    $property->contact_number = $_POST['contact_number'];
    $property->field_type = $_POST['field_type'];
    $property->field_classification = $_POST['field_classification'];
    if(!empty($_POST['options'])){
        $property->options = $_POST['options'];
    }
    try {
            $property->finishCreatingTeren();
            $property->setOptions();
            $property->propertyExpiration($property->expiration);
            $photo->saveImages($_FILES['upload'], $_SESSION['user_id']['id'], $property->id );
            $photo->isFeatured($_FILES['featured'], $_SESSION['user_id']['id'], $property->id);
            redirect("edit_property_type.php?id={$property->id}");

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }



}

?>


<div class="container">

    <?php $existing_property->getPhotos($_GET['id']); ?>
    <br>
    <h1>FEATURED IMAGE</h1>
    <br>
    <?php $existing_property->getFeaturedImage($_GET['id']); ?>
</div>
<div class="alert-danger">
    <p>Errors?</p>
    <?php echo $photo->getError(); ?>
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
            <input type="file" multiple name="upload[]" class="form-control" >
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
            <label for="surface">Surface</label>
            <input type="text" name="surface" class="form-control" value="<?php echo $existing_property->surface;?>">
        </div>
        <div class="form-group">
            <label for="expiration">Keep Alive</label>
            <p>Time remaining:<?php echo $existing_property->convertUnixTimeToDate($existing_property->expiration)   ;?></p>
            <p>Time remaining:<?php echo ($existing_property->expiration - date('U'))/60/60/24;?></p>
            <p>Time remaining:<?php echo $existing_property->getRemainingExpirationTime($existing_property->expiration); ?></p>
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
            <label for="field_type">field type</label>
            <select name="field_type" class="form-control">
                <option value="<?php echo $existing_property->field_type;?>" selected><?php echo $existing_property->field_type;?></option>
                <option value="spatiu liber">spatiu liber</option>
                <option value="pasune">pasune</option>
                <option value="padure">padure</option>
                <option value="constructii">constructii</option>
            </select>
        </div>
        <div class="form-group">
            <label for="field_classification">Field clasification</label>
            <select name="field_classification" class="form-control">
                <option value="<?php echo $existing_property->field_classification;?>" selected><?php echo $existing_property->field_classification;?></option>
                <option value="intravilan">intravilan</option>
                <option value="extravilan">extravilan</option>
            </select>
        </div>
        <div class="form-group">
            <p>Your Interests are:<?php echo $existing_property->options;?></p>
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
            <label for="address">Adress</label>
            <input type="text" name="address" class="form-control" value="<?php echo $existing_property->address;?>">
        </div>
        <div class="form-group">
            <input type="submit" value="CREATE COMMERCIAL SPACE" name="submit" class="btn btn-primary pull-right" >
        </div>

    </div>
    <?php var_dump($photo->errors); ?>
</form>