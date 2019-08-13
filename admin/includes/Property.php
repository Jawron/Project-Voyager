<?php


class Property extends Main_object {

    protected static $db_table = "properties";
    protected static $db_table_fields = [
        'date_created',
        'expiration',
        'type',
        'transaction',
        'title',
        'images',
        'rooms',
        'partitions',
        'comfort',
        'floor',
        'surface',
        'price',
        'commission',
        'address',
        'construction_year',
        'total_floors',
        'description',
        'contact_number',
        'orientation',
        'bathrooms',
        'options',
        'field_type',
        'field_classification',
        'commercial_space'
    ];

    public $errors;

    public $id;
    public $date_created;
    public $expiration;
    public $type;
    public $category_id;
    public $transaction;
    public $title;
    public $rooms;
    public $partitions;
    public $comfort;
    public $floor;
    public $surface;
    public $price;
    public $commission;
    public $address;
    public $construction_year;
    public $total_floors;
    public $description;
    public $contact_number;
    public $orientation;
    public $condition;
    public $bathrooms;
    public $options;
    public $field_type; //padure,constructi,pasune
    public $field_classification;// intravilan/ extravilan
    public $commercial_space;




//    public function createProperty(){
//        global $database;
//        $sql = "INSERT INTO properties ";
//        $sql .= " (date_created, expiration, type, transaction, title, rooms, partitions, comfort, floor, surface, price, commission, address, construction_year, total_floors, description, contact_number, orientation, bathrooms, field_type, field_classification, commercial_space) ";
//        $sql .= " VALUES('$this->date_created','$this->expiration','$this->type','$this->transaction','$this->title','$this->rooms','$this->partitions','$this->comfort','$this->floor','$this->surface','$this->price','$this->commission','$this->address','$this->construction_year','$this->total_floors','$this->description','$this->contact_number','$this->orientation','$this->bathrooms','$this->field_type','$this->field_classification','$this->commercial_space') ";
//
//        $database->query($sql);
//
//    }

    public function createProperty(){
        global $database;
        $sql = "INSERT INTO properties (title, type,user_id) VALUES ('$this->title','$this->type',$this->id)";
        $database->query($sql);
    }

    public function setOptions(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->options = implode(',',$_POST['options']);
            //echo var_dump($this->interests);
            global $database;
            $sql = "UPDATE properties SET options = '$this->options' ";
            $database->query($sql);
        }

    }

    public function finishCreatingProperty(){
        global $database;
        $sql = "UPDATE properties SET 
                      date_created = '".self::clean($this->date_created)."',
                      transaction = '".self::clean($this->transaction)."',
                      title = '".self::clean($this->title)."',
                      rooms= '".self::clean($this->rooms)."',
                      category_id = '".self::clean($this->category_id)."',
                      partitions = '".self::clean($this->partitions)."',
                      floor = '".self::clean($this->floor)."',
                      surface = '".self::clean($this->surface)."',
                      price = '".self::clean($this->price)."',
                      commission = '".self::clean($this->commission)."',
                      construction_year = '".self::clean($this->construction_year)."',
                      description = '".self::clean($this->description)."',
                      address = '".self::clean($this->address)."',
                      contact_number = '".self::clean($this->contact_number)."'
                       WHERE id = '".self::clean($this->id)."'
                    ";
        $database->query($sql);

    }


    // verifica ce tip de proprietate este si incarca templateul corespunzator
    public function getType($type){
        switch ($type) {
            case 'apartament':
                include('property_includes/apartament.php');
                break;
            case 'teren':
                include('property_includes/teren.php');
                break;
            case 'casa':
                include('property_includes/casa.php');
                break;
            case 'spatiu comercial':
                include('property_includes/spatiu_comercial.php');
                break;
            default :
                redirect("properties.php");
        }
    }

    public function editType($type){
        switch ($type) {
            case 'apartament':
                include('property_includes/edit_apartament.php');
                break;
            case 'teren':
                include('property_includes/edit_teren.php');
                break;
            case 'casa':
                include('property_includes/edit_casa.php');
                break;
            case 'spatiu comercial':
                include('property_includes/edit_spatiu_comercial.php');
                break;
            default :
                redirect("properties.php");
        }
    }

    //reintoarce idul ultimei inserati in baza de date a userului current
    public function getLastInsertedProperty($username_id){
        global $database;
        $sql = "SELECT id FROM properties WHERE user_id = $username_id ORDER BY id DESC";
        $rows = $database->query($sql);
        $row_id = mysqli_fetch_assoc($rows);

        return $result = array_shift($row_id);

    }


    public function getCategories(){
        global $database;
        $sql = "SELECT * FROM category";
        $result = $database->query($sql);

        while ($row = mysqli_fetch_assoc($result)){
            echo "<option value='{$row['id']}'>{$row['cat_name']}</option>";
        }
    }

    public function getCategory($id){
        global $database;
        $sql = "SELECT cat_name FROM category WHERE id = ".self::clean($id);
        $row = $database->query($sql);

        $result = mysqli_fetch_assoc($row);

        return $result['cat_name'];

    }

    public function getPhotos($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".self::clean($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            if($result['is_featured'] == 'yes'){
                echo "<h3>FEATURED IMAGEd</h3>";
                echo "{$result['id']}<br>{$result['caption']}<br>";

                echo "<img src='images/{$result['photo']}' height='300' style='border:2px solid #000'><br>";
            } else {
                echo "<img src='images/{$result['photo']}'height='300'>";
            }

        }
    }


    public function propertyExpiration($expiration){
        $start_date = date('U');
        $expiration_time = $expiration * 60 * 60;
        $end_date = $start_date + $expiration_time;
        //echo $end_date;

        global $database;
        $sql = "UPDATE properties SET expiration = ".self::clean($end_date)." WHERE id = ".self::clean($this->id)." ";
        $database->query($sql);
    }

    public function convertUnixTimeToDate($unix_time){
        return date("D M j G:i:s T Y", $unix_time);
    }

    public function getRemainingExpirationTime($expiration){
        $date = date('U');
        $result = ($expiration - $date)/60/60/24;
        $unformated = explode(".",$result);
        return $formated_result = current($unformated);
    }


































}// end of class