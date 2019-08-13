<?php


class Photo extends Main_object {
    public static $db_table = "photo";
    public $id;
    public $photo;
    public $caption;
    public $alt_text;
    public $type;
    public $size;
    public $post_id;
    public $user_id;
    public $is_featured;
    public $tmp_path;
    public $errors = array();
    public $error_msg;
    public $upload_directory = "images/";




    public function saveImages($file,$user_id,$post_id = NULL) {



            $count_files = count($file['name']);
            echo "<pre>";
            var_export($file);
        echo "</pre>";
            for ($i = 0; $i < $count_files; $i++){

                $this->photo    = $user_id.$file['name'][$i];
                $this->size     = $file['size'][$i];
                $this->type     = $file['type'][$i];
                $this->tmp_path = $file['tmp_name'][$i];
                $this->error_msg= $file['error'][$i];

                if($this->size > 4000000){
                    $this->errors = "The file $this->photo is larger than 4 MB";
                }

                if(file_exists($this->upload_directory.$this->photo)){
                    $this->errors = "The file $this->photo already exists on the server. Consider changing the name";
                }

                if($this->error_msg > 0){
                    $this->errors = $this->error_msg;
                }

                $exploded = explode('.', $this->photo);
                $file_ext = strtolower(end($exploded));
                $extensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $extensions) === false) {
                    $this->errors = "Extension not allowed, please choose a JPEG or PNG file.";

                }

                if (empty($this->photo) || !$this->photo || !is_array($file)) {
                    $this->errors = "There was no file uploaded here";

                }

                if(empty($this->errors) === true && $this->tmp_path != ""){
                    $newFilePath = "./$this->upload_directory".$this->photo;

                    if (move_uploaded_file($this->tmp_path, $newFilePath)) {
                            echo "Uploaded succesfully";
                        global $database;
                        $sql = "INSERT INTO photo (photo,caption,type,size,user_id,post_id) ";
                        $sql .= " VALUES('$this->photo','$this->photo','$this->type','$this->size','$user_id','$post_id')";
                        $database->query($sql);

                       } else {
                        echo "Error";
                    }
                } else {
                    if(is_array($this->errors)){
                        foreach ($this->errors as $error) {
                            echo $error;
                            echo $this->error_msg;
                        }
                    } else {
                        echo $this->errors;
                        echo $this->error_msg;
                    }
                }


            }
    }

//    public function saveImageData($user_id){
//        global $database;
//        $sql = "INSERT INTO photo (photo,caption,type,size,user_id) ";
//        $sql .= " VALUES('$this->photo','$this->photo','$this->type','$this->size','$user_id')";
//        $database->query($sql);
//    }

    public function saveEditedPhoto(){
        global $database;
        $sql = "UPDATE photo SET caption = '".self::clean($this->caption)."', alt_text = '".self::clean($this->alt_text)."'";
        $sql .= " WHERE id = ".self::clean($this->id)."";
        $database->query($sql);
    }


    public function deletePhoto(){

        global $database;

        $sql = "DELETE FROM photo WHERE id = ".self::clean($this->id)." ";
        if($database->query($sql)) {
            $target_path = $this->upload_directory.$this->photo;
            return unlink($target_path);
        }
    }


    public function isFeatured($file,$user_id,$post_id = NULL){

        var_export($file);

        $this->photo    = $user_id.$file['name'];
        $this->size     = $file['size'];
        $this->type     = $file['type'];
        $this->tmp_path = $file['tmp_name'];
        $this->error_msg= $file['error'];

        if($this->size > 4000000){
            $this->errors = "The file $this->photo is larger than 4 MB";
        }

        if(file_exists($this->upload_directory.$this->photo)){
            $this->errors = "The file $this->photo already exists on the server. Consider changing the name";
        }

        if($this->error_msg > 0){
            $this->errors = $this->error_msg;
        }

        $exploded = explode('.', $this->photo);
        $file_ext = strtolower(end($exploded));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $this->errors = "Extension not allowed, please choose a JPEG or PNG file.featured";

        }

        if (empty($this->photo) || !$this->photo || !is_array($file)) {
            $this->errors = "There was no file uploaded here";

        }

        if(empty($this->errors) === true && $this->tmp_path != ""){
            $newFilePath = "./$this->upload_directory".$this->photo;

            if (move_uploaded_file($this->tmp_path, $newFilePath)) {
                echo "Uploaded succesfully";
                global $database;

                $sql = "SELECT * FROM photo WHERE post_id = ".self::clean($post_id)." AND is_featured = 'yes'";
                $result = mysqli_fetch_assoc($database->query($sql));

                if(!empty($result)) {
                    if ($result['is_featured'] == 'yes') {
                        $id = $result['id'];
                        $sql = "UPDATE photo SET photo = '".self::clean($this->photo)."' WHERE post_id = ".self::clean(
                                $post_id
                            )."  AND is_featured = 'yes' AND id = ".self::clean($id);
                        $database->query($sql);
                    }
                } else {
                    $sql = "INSERT INTO photo (photo,caption,type,size,user_id,post_id, is_featured) ";
                    $sql .= " VALUES('$this->photo','$this->photo','$this->type','$this->size','$user_id','$post_id','yes')";
                    $database->query($sql);
                }

            } else {
                echo "Error";
            }
        } else {
            if(is_array($this->errors)){
                foreach ($this->errors as $error) {
                    echo $error;
                }
            } else {
                echo $this->errors;
            }
        }
    }


//
//    public function saveImages($file)
//    {
//        $file = array_filter($file); //something like that to be used before processing files.
//
//        // Count # of uploaded files in array
//        $total = count($file['name']);
//        $photo_names = array();
//
//        // Loop through each file
//        for ($i = 0; $i < $total; $i++) {
//            $this->name = $_FILES['upload']['name'][$i];
//            $this->size = $_FILES['upload']['size'][$i];
//            $this->tmp_path = $_FILES['upload']['tmp_name'][$i];
//            $this->type = $_FILES['upload']['type'][$i];
//            if ($this->size > 4097152) {
//                $this->errors = 'File size must be lower than 4MB';
//
//            }
//
//
//
//            if (empty($this->tmp_path) || empty($this->name)) {
//                $this->errors = "File not found!";
//                return false;
//
//            }
//
//            if (file_exists($this->upload_directory."/".$this->name)) {
//                $this->errors = "File with the name $this->name already exists";
//
//
//            }
//            $exploded = explode('.', $this->name);
//            $file_ext = strtolower(end($exploded));
//
//            $extensions = array("jpeg", "jpg", "png");
//            if (in_array($file_ext, $extensions) === false) {
//                $this->errors = "Extension not allowed, please choose a JPEG or PNG file.";
//
//            }
//
//
//            if (empty($file) || !$file || !is_array($file)) {
//                $this->errors = "There was no file uploaded here";
//                return false;
//
//            }
//            if ($_FILES['upload']['error'][$i] != 0) {
//                $this->errors = $this->upload_errors_array[$_FILES['upload']['error'][$i]];
//                return false;
//            }
//
//
//            //Make sure we have a file path
//            if (empty($this->errors) === true) {
//                if ($this->tmp_path != "") {
//                    //Setup our new file path
//                    $newFilePath = "./$this->upload_directory/".$_FILES['upload']['name'][$i];
//
//                    if (move_uploaded_file($this->tmp_path, $newFilePath)) {
//
//                    }
//                }
//            }
//
//
//            $photo_names += $_FILES['upload']['name'];
//
//
//        }
//        $photo_names = implode(',', $photo_names);
//        if (empty($this->errors) === true) {
//
//
//
//            global $database;
//            $sql = "INSERT INTO  images (title, caption,alt_text, description,name,post_id) ";
//            $sql .= "VALUES ('$this->title','$this->caption','$this->alt_text','$this->description','".$this->clean($photo_names)."','$this->post_id')";
//            if ($database->query($sql)) {
//                echo "MERGE SQL SAVE IMAGE";
//                var_dump($this->errors);
//                echo "<br>";
//                var_dump($this->name);
//            } else {
//                echo "NU MERGE SQL SAVE IMAGE";
//            }
//        } else {
//            if(is_array($this->errors)) {
//                foreach ($this->errors as $error) {
//                    echo $error;
//                }
//            } else {
//                echo $this->errors;
//            }
//        }
//    }
//
//    public function featuredImage($file){
//
//
//            $this->name = $this->post_id.'-'.$file['name'];
//            $this->size =$file['size'];
//            $this->tmp_path =$file['tmp_name'];
//            $this->type=$file['type'];
//
//
//
//
//
//
//        if(empty($this->tmp_path) || empty($this->name)){
//            $this->errors = "File not ffound!";
//        }
//
//        if(file_exists($this->upload_directory."/".$this->name)){
//            $this->errors = "File with the name $this->name already exists";
//        }
//
//        $extensions= array("jpeg","jpg","png");
//        $exploded = explode('.',$this->name);
//        $file_ext = strtolower(end($exploded));
//        if(in_array($file_ext,$extensions)=== false){
//            $this->errors="Extension not allowed, please choose a JPEG or PNG file.";
//        }
//
//        if($this->size > 4097152){
//            $this->errors ='File size must be lower than 4MB';
//        }
//
//        if(empty($this->errors)===true){
//            if(move_uploaded_file($this->tmp_path,$this->upload_directory.DS.$this->name)) {
//                global $database;
//                $sql = "UPDATE images SET featured = '$this->name' WHERE post_id = $this->post_id";
//                if ($database->query($sql)) {
//                    echo "MERGE SQL";
//                    var_dump($this->size);
//                } else {
//                    echo "NU MERGE SQL";
//                }
//            }
//        }else{
//            if(is_array($this->errors)) {
//                foreach ($this->errors as $error) {
//                    echo $error;
//                }
//            } else {
//                echo $this->errors;
//            }
//        }
//    }
//
//
//







} // end of class