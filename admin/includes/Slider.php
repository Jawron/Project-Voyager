<?php


class Slider extends Main_object {

    protected static $db_table = "slider";
//    protected static $db_table_fields = [
//        'photo',
//        'type',
//        'size',
//        'alt_text',
//        'user_id',
//        'slide_id',
//        'title',
//        'description',
//        'call_to_action'
//    ];
    public $id;
    public $photo;
    public $type;
    public $size;
    public $alt_text;
    public $user_id;
    public $slide_id;
    public $title;
    public $description;
    public $call_to_action;
    public $tmp_path;
    public $error_msg;
    public $upload_directory = "images/";







    public function saveImages($file,$user_id,$slider_id = NULL) {

            $this->photo    = $user_id.'-'.rand(0, 999999).$file['name'];
            $this->size     = $file['size'];
            $this->type     = $file['type'];
            $this->tmp_path = $file['tmp_name'];
            $this->error_msg= $file['error'];

            if($this->size > 4000000){
                $this->setError("The file $this->photo is larger than 4 MB");
            }

            if(file_exists($this->upload_directory.$this->photo)){
                $this->setError("The file $this->photo already exists on the server. Consider changing the name");
            }

            $exploded = explode('.', $this->photo);
            $file_ext = strtolower(end($exploded));
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                if(empty($file_ext)){
                    $this->setError("Extension not allowed, please choose a JPEG or PNG file.saveImages");

                }

            }

            if (empty($this->photo) || !$this->photo || !is_array($file)) {
                $this->setError("There was no file uploaded here");
            }

//                if($this->error_msg != 4 && $this->error_msg == 0){
//                    $this->setError("Error is : $this->error_msg");
//                    var_dump($this->error_msg);
//                }

            if(empty($this->errors) === true && $this->tmp_path != ""){
                $newFilePath = "./$this->upload_directory".$this->photo;

                if (move_uploaded_file($this->tmp_path, $newFilePath)) {
//                            echo "Uploaded succesfully";
                    global $database;
                    $sql = "INSERT INTO slides (photo,alt_text,type,size,user_id,slider_id,description,call_to_action,title) ";
                    $sql .= " VALUES('$this->photo','$this->alt_text','$this->type','$this->size','$user_id','$slider_id','$this->description','$this->call_to_action','$this->title')";
                    $database->query($sql);

                } else {
                    echo "Error while uploading";
                }
            }

    }


    public function getLastInsertedSlider($username_id){
        global $database;
        $sql = "SELECT id FROM slider WHERE user_id = $username_id ORDER BY id DESC";
        $rows = $database->query($sql);
        $row_id = mysqli_fetch_assoc($rows);

        return $result = array_shift($row_id);

    }

    public function createSlider(){
        global $database;
        $sql = "INSERT INTO slider (title,user_id) VALUES ('$this->title',$this->id)";
        $database->query($sql);
    }



    public function getPhotos($id){
        global $database;
        $sql = "SELECT photo,title,description,call_to_action FROM slides WHERE slider_id = ".self::clean($id);
        $row = $database->query($sql);
        while($result = mysqli_fetch_assoc($row)){
//            echo $result['id'];
//            echo $result['photo'];
//            echo "<br>";

            echo "
            
                <div class='slide'>
                    <img src='images/{$result['photo']}'>
                    <div class='container'>
                        <div class='slider-text-info'>
                            <p class='title-slider'>{$result['title']}</p>
                            <p class='desc'>{$result['description']}</p>
                            <p class='call-to-action'><a href='demo.php'>{$result['call_to_action']} <i class='fas fa-arrow-right'></i></a></p>
                        </div>
                    </div>
                </div>
           
    ";

        }
    }

    public function getSlidesToEdit($id){
        global $database;
        $sql = "SELECT * FROM slides WHERE slider_id = ".self::clean($id);
        $row = $database->query($sql);
        while($result = mysqli_fetch_assoc($row)){
            echo "
            <div class='clearfix'></div>
                <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan='2'>ACTION</th>
                </tr>
                <tr>
                    <td>{$result['id']}</td>
                    <td>{$result['photo']}</td>
                    <td><a href='edit_slide.php?id={$result['id']}'>EDIT</a></td>
                    <td>{$result['title']}</td>
                </tr>    
                </table>
            ";
        }
    }



    public function editImages($file,$user_id,$slider_id = NULL) {

        $this->photo    = $user_id.'-'.rand(0, 999999).$file['name'];
        $this->size     = $file['size'];
        $this->type     = $file['type'];
        $this->tmp_path = $file['tmp_name'];
        $this->error_msg= $file['error'];

        if($this->size > 4000000){
            $this->setError("The file $this->photo is larger than 4 MB");
        }

        if(file_exists($this->upload_directory.$this->photo)){
            $this->setError("The file $this->photo already exists on the server. Consider changing the name");
        }

        $exploded = explode('.', $this->photo);
        $file_ext = strtolower(end($exploded));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            if(empty($file_ext)){
                $this->setError("Extension not allowed, please choose a JPEG or PNG file.saveImages");

            }

        }

        if (empty($this->photo) || !$this->photo || !is_array($file)) {
            $this->setError("There was no file uploaded here");
        }

//                if($this->error_msg != 4 && $this->error_msg == 0){
//                    $this->setError("Error is : $this->error_msg");
//                    var_dump($this->error_msg);
//                }

        if(empty($this->errors) === true && $this->tmp_path != ""){
            $newFilePath = "./$this->upload_directory".$this->photo;

            if (move_uploaded_file($this->tmp_path, $newFilePath)) {
//                            echo "Uploaded succesfully";
                global $database;
                $sql = "UPDATE slides SET photo='$this->photo',
                        type= '$this->type',
                        size= '$this->size',
                        alt_text = '$this->alt_text',
                        title= '$this->title',
                        description ='$this->description',
                        call_to_action = '$this->call_to_action' WHERE id = $slider_id";
                $database->query($sql);

            } else {
                echo "Error while uploading";
            }
        }

    }

    public function editFields($slider_id){
        global $database;
        $sql = "UPDATE slides SET 
                        alt_text = '$this->alt_text',
                        title= '$this->title',
                        description ='$this->description',
                        call_to_action = '$this->call_to_action' WHERE id = $slider_id";
        $database->query($sql);
    }

    public static function findByIDSlide($id){
        global $database;
        $the_result_array = static::findByQuery("SELECT * FROM slides WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public function deleteSlider(){
        global $database;

        $sql = "DELETE FROM slider WHERE id = ".self::clean($this->id)." ";
        $database->query($sql);
    }

    public function setMainSlider($slider){
        global $database;
        $sql = "UPDATE slider SET in_use = 0 WHERE in_use = 1";
        $database->query($sql);

        $sql = "UPDATE slider SET in_use = 1 WHERE title = '".self::clean("$slider")."'";
        $database->query($sql);
    }

    public function returnActiveSlider(){
        global $database;
        $sql = "SELECT title FROM slider WHERE in_use = 1";
        $result = $database->query($sql);
         while ($row = mysqli_fetch_assoc($result)){
             echo "{$row['title']}";
         }
    }
































}