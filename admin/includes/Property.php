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

    public $errors = array();

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

    private function setError($message) {
        if (empty($this->errors)) {
            $this->errors = $message;
        }
    }

    public function getError(){
        if(is_array($this->errors)){
            foreach ($this->errors as $error) {
                return $error;
            }
        } else {
            return $this->errors;
        }
    }

    public function createProperty(){
        global $database;
        $sql = "INSERT INTO properties (title, type,user_id) VALUES ('$this->title','$this->type',$this->id)";
        if(!$database->query($sql)){
            $this->setError("Property could not be created. If the error persists contact the site administrator");
        }
    }

    public function setOptions(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(!empty($this->options)){
                $this->options = implode(',',$this->options);
                //echo var_dump($this->interests);
                global $database;
                $sql = "UPDATE properties SET options = '$this->options' ";
                $database->query($sql);
            }

        }

    }

    public function finishCreatingApartment(){
        global $database;
        $sql = "UPDATE properties SET
                      date_created = '".$database->escapeString($this->date_created)."',
                      transaction = '".$database->escapeString($this->transaction)."',
                      title = '".$database->escapeString($this->title)."',
                      rooms= '".$database->escapeString($this->rooms)."',
                      category_id = '".$database->escapeString($this->category_id)."',
                      partitions = '".$database->escapeString($this->partitions)."',
                      floor = '".$database->escapeString($this->floor)."',
                      surface = '".$database->escapeString($this->surface)."',
                      price = '".$database->escapeString($this->price)."',
                      commission = '".$database->escapeString($this->commission)."',
                      construction_year = '".$database->escapeString($this->construction_year)."',
                      description = '".$database->escapeString($this->description)."',
                      address = '".$database->escapeString($this->address)."',
                      total_floors = '".$database->escapeString($this->total_floors)."',
                      orientation = '".$database->escapeString($this->orientation)."',
                      bathrooms = '".$database->escapeString($this->bathrooms)."',
                      comfort = '".$database->escapeString($this->comfort)."',
                      contact_number = '".$database->escapeString($this->contact_number)."'
                       WHERE id = '".$database->escapeString($this->id)."'
                    ";
        $database->query($sql);

    }

    public function finishCreatingCommercialSpace(){
        global $database;
        $sql = "UPDATE properties SET
                      date_created = '".$database->escapeString($this->date_created)."',
                      transaction = '".$database->escapeString($this->transaction)."',
                      title = '".$database->escapeString($this->title)."',
                      rooms= '".$database->escapeString($this->rooms)."',
                      category_id = '".$database->escapeString($this->category_id)."',
                      partitions = '".$database->escapeString($this->partitions)."',
                      floor = '".$database->escapeString($this->floor)."',
                      surface = '".$database->escapeString($this->surface)."',
                      price = '".$database->escapeString($this->price)."',
                      commission = '".$database->escapeString($this->commission)."',
                      construction_year = '".$database->escapeString($this->construction_year)."',
                      description = '".$database->escapeString($this->description)."',
                      address = '".$database->escapeString($this->address)."',
                      contact_number = '".$database->escapeString($this->contact_number)."'
                       WHERE id = '".$database->escapeString($this->id)."'
                    ";
        $database->query($sql);

    }

    public function finishCreatingTeren(){
        global $database;
        $sql = "UPDATE properties SET
                      date_created = '".$database->escapeString($this->date_created)."',
                      transaction = '".$database->escapeString($this->transaction)."',
                      title = '".$database->escapeString($this->title)."',
                      surface = '".$database->escapeString($this->surface)."',
                      category_id = '".$database->escapeString($this->category_id)."',
                      price = '".$database->escapeString($this->price)."',
                      commission = '".$database->escapeString($this->commission)."',
                      description = '".$database->escapeString($this->description)."',
                      address = '".$database->escapeString($this->address)."',
                      total_floors = '".$database->escapeString($this->total_floors)."',
                      contact_number = '".$database->escapeString($this->contact_number)."',
                      field_type = '".$database->escapeString($this->field_type)."',
                      field_classification = '".$database->escapeString($this->field_classification)."'
                       WHERE id = '".$database->escapeString($this->id)."'
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
        $sql = "SELECT cat_name FROM category WHERE id = ".$database->escapeString($id)." ";
        $row = $database->query($sql);


        while($result = mysqli_fetch_assoc($row)){
            echo  $result['cat_name'];
        }


    }

    public function getPhotosNames($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            echo "<p><span>{$result['id']}</span> - {$result['photo']}".
                ($result['is_featured'] == 'yes' ? " <i class=\"fas fa-dot-circle\" style='color: #00b894'></i>": "")

            ."<a href=\"delete_property_photo.php?id={$result['id']}\" style='float: right;color: darkred' ><i class=\"fas fa-times\"></i></a></p>";

        }
    }

    public function getPhotos($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
                echo "<img src='images/{$result['photo']}' class='modal-images'>";
        }
    }

    public function getFeaturedImage($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            if($result['is_featured'] == 'yes'){
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
        $sql = "UPDATE properties SET expiration = ".$database->escapeString($end_date)." WHERE id = ".$database->escapeString($this->id)." ";
        $database->query($sql);
    }

    public function convertUnixTimeToDate($unix_time){
        return date("D M j G:i:s Y", $unix_time);
    }

    public function getRemainingExpirationTime($expiration){
        $date = date('U');
        $result = ($expiration - $date)/60/60/24;
        $unformated = explode(".",$result);
        $formated_result = current($unformated);
        if ($formated_result <= 0){
            return "0";
        } else {
            return $formated_result;
        }

    }

    public function deleteProperty(){
        global $database;

        $sql = "DELETE FROM properties WHERE id = ".$database->escapeString($this->id)." ";
        $database->query($sql);
    }

    public function optionIsChecked($needle,$haystack){
        $n = $needle;
        $h = $haystack;
        $pos = strpos($h,$n,0);
        if($pos !== false) {
            echo  "checked";
        } else {
            echo "";
        }
    }

    public function insertWishlist($post_id,$user_id){
        global $database;
        $sql = "INSERT INTO saved_properties (user_id,post_id) VALUES ('$user_id','$post_id')";
        $database->query($sql);
    }

    public function getWhislistProperties($id){
        global $database;
        $sql = "SELECT post_id FROM saved_properties WHERE user_id = ".$database->escapeString($id);
        $result = $database->query($sql);
        $post_array = array();
        while($row = mysqli_fetch_assoc($result)){
            $post_array[] += $row['post_id'];
        }
        $post_array = array_unique($post_array);
        foreach ($post_array as $value){
            $sql = "SELECT * FROM photo LEFT JOIN properties ON post_id = properties.id WHERE photo.is_featured = 'yes' AND properties.id = {$value} ORDER BY properties.id DESC LIMIT 6";
            $result = $database->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class=\"col-md-4 col-xs-12\">
                <div class=\"card custom-css-card\" >
                <a href='property.php?id={$row['id']}'>
                    <img src=\"images/{$row['photo']}\" class=\"card-img-top\" alt=\"...\">
                    <div class=\"card-body\">
                        <h2>{$row['title']}</h2>
                        <div class=\"row card-row\">
                            <div class=\"col-md-6\" style=\"padding-left:0px\">
                                <div class=\"card-left\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-exchange-alt\"></i></div>
                                        <div class=\"card-text\">{$row['transaction']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-cookie\"></i></div>
                                        <div class=\"card-text\">{$row['surface']}mp</div>
                                    </div>
                                    <div class=\"card-type\"></div>
                                </div>
                            </div>
                            <div class=\"col-md-6\" style=\"padding-right:0px;padding-left:0px\">
                                <div class=\"card-right\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-home\"></i></div>
                                        <div class=\"card-text\">{$row['type']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-comments-dollar\"></i></div>
                                        <div class=\"card-text\">{$row['commission']}%</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class=\"container\" style=\"padding-top: 15px\">
                            <div class=\"row\">
                                <div class=\"col-md-6 price\" style=\"padding-left:0px;margin-left:-10px \"><i class=\"fas fa-dollar-sign\"></i>{$row['price']}</div>
                                <div class=\"col-md-6 card-link\" style=\"padding-right:0px;margin-left: 10px;margin-right;-10px;text-align: right\"> <span>See listing</span></div>

                            </div>
                        </div>
                    </div>
                </a>
                </div>
                </div>";
            }
        }
        var_dump($result);
    }



    public function getAllProperties($limit){
        global $database;
        global $session;
        if(!$session->isSignedIn()){
            $role= '';
        } else {
            $username = Users::clean($_SESSION['user_id']['username']);
            $role = Users::clean($_SESSION['user_id']['role']);
        }

        $sql = "SELECT * FROM photo LEFT JOIN properties ON post_id = properties.id WHERE photo.is_featured = 'yes' ORDER BY properties.id DESC LIMIT $limit";
        $result = $database->query($sql);
        If(isset($_POST['wishlist'])){
            $post_id = $_POST['post_id'];
            $user_id = Users::clean($_SESSION['user_id']['id']);

            $this->insertWishlist($post_id,$user_id);
        }
         while($row = mysqli_fetch_assoc($result)){

             echo "
             <div class=\"col-md-4 col-xs-12\">
                <div class=\"card custom-css-card\" >
                <a href='property.php?id={$row['id']}'>
                    <img src=\"admin/images/{$row['photo']}\" class=\"card-img-top\" alt=\"...\" style='position:relative;'>
                    ";

                    if($role == "client"){
                        echo "
                        <div class='wishlist'>
                        <form method='post'>
                            <input type='hidden' name='post_id' value='{$row['id']}'>
                            <button type='submit' name='wishlist' class='wishlist-button'><i class=\"far fa-heart\"></i></button>
                        </form>
                    </div>
                        ";
                    } else {
                        echo '';
                    }
                 echo "
                    <div class=\"card-body\">
                        <h2>{$row['title']}</h2>
                        <div class=\"row card-row\">
                            <div class=\"col-md-6\" style=\"padding-left:0px\">
                                <div class=\"card-left\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-exchange-alt\"></i></div>
                                        <div class=\"card-text\">{$row['transaction']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-cookie\"></i></div>
                                        <div class=\"card-text\">{$row['surface']}mp</div>
                                    </div>
                                    <div class=\"card-type\"></div>
                                </div>
                            </div>
                            <div class=\"col-md-6\" style=\"padding-right:0px;padding-left:0px\">
                                <div class=\"card-right\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-home\"></i></div>
                                        <div class=\"card-text\">{$row['type']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-comments-dollar\"></i></div>
                                        <div class=\"card-text\">{$row['commission']}%</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class=\"container\" style=\"padding-top: 15px\">
                            <div class=\"row\">
                                <div class=\"col-md-6 price\" style=\"padding-left:0px;margin-left:-10px \"><i class=\"fas fa-dollar-sign\"></i>{$row['price']}</div>
                                <div class=\"col-md-6 card-link\" style=\"padding-right:0px;margin-left: 10px;margin-right;-10px;text-align: right\"> <span>See Listing</span></div>

                            </div>
                        </div>
                    </div>
                </a>
                </div>
                </div>
             ";
         }
    }

    public function getSearchProperties($search_term){
        global $database;
        $sql = "SELECT * FROM photo LEFT JOIN properties ON post_id = properties.id WHERE properties.title LIKE '%".$database->escapeString($search_term)."%' ORDER BY properties.id DESC ";
        $result = $database->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "
             <div class=\"col-md-4 col-xs-12\">
                <div class=\"card custom-css-card\" >
                <a href='property.php?id={$row['id']}'>
                    <img src=\"admin/images/{$row['photo']}\" class=\"card-img-top\" alt=\"...\">
                    <div class=\"card-body\">
                        <h2>{$row['title']}</h2>
                        <div class=\"row card-row\">
                            <div class=\"col-md-6\" style=\"padding-left:0px\">
                                <div class=\"card-left\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-exchange-alt\"></i></div>
                                        <div class=\"card-text\">{$row['transaction']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-cookie\"></i></div>
                                        <div class=\"card-text\">{$row['surface']}mp</div>
                                    </div>
                                    <div class=\"card-type\"></div>
                                </div>
                            </div>
                            <div class=\"col-md-6\" style=\"padding-right:0px;padding-left:0px\">
                                <div class=\"card-right\">
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-home\"></i></div>
                                        <div class=\"card-text\">{$row['type']}</div>
                                    </div>
                                    <div class=\"card-cluster\">
                                        <div class=\"card-icon\"><i class=\"fas fa-comments-dollar\"></i></div>
                                        <div class=\"card-text\">{$row['commission']}%</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class=\"container\" style=\"padding-top: 15px\">
                            <div class=\"row\">
                                <div class=\"col-md-6 price\" style=\"padding-left:0px;margin-left:-10px \"><i class=\"fas fa-dollar-sign\"></i>{$row['price']}</div>
                                <div class=\"col-md-6 card-link\" style=\"padding-right:0px;margin-left: 10px;margin-right;-10px;text-align: right\"> <span>See Listing</span></div>

                            </div>
                        </div>
                    </div>
                </a>
                </div>
                </div>
             ";
        }
    }


    public function getPhotosProperty($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            echo "<div class=\"carousel-item\">
                    <img class=\"d-block w-100\" src='admin/images/{$result['photo']}' alt=\"Second slide\">
                  </div>";
        }
    }
    public function getPhotosPropertyFeaturedImage($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id)." AND is_featured = 'yes'";
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            echo "<div class=\"carousel-item active\">
                    <img class=\"d-block w-100\" src='admin/images/{$result['photo']}' alt=\"Second slide\">
                  </div>";
        }
    }

    public function getAllPropertyImagesThumb($id){
        global $database;
        $sql = "SELECT * FROM photo WHERE post_id = ".$database->escapeString($id);
        $row = $database->query($sql);

        while($result = mysqli_fetch_assoc($row)){
            echo "<img class='thumb-images-property' src='admin/images/{$result['photo']}' alt=\"Second slide\">";
        }
    }

    public function getUsernameFromId($id){
        global $database;
        $sql = "SELECT user_id FROM properties WHERE id =".$database->escapeString($id);
        $result = $database->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $sql = "SELECT username FROM users WHERE id = {$row['user_id']}";
            $result = $database->query($sql);
            return $row = current(mysqli_fetch_assoc($result));
        }




    }

    public function stringToArray($string){
        $array = explode(',',$string);
        return $array;
    }

























}// end of class