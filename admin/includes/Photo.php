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


    public function getUserById($id){
        global $database;
        $sql = "SELECT username FROM users WHERE id = ".self::clean("$id");
        $result = $database->query($sql);

        while($row = mysqli_fetch_assoc($result)){
            return $row['username'];
        }
    }


    public function saveImages($file,$user_id,$post_id = NULL) {



            $count_files = count($file['name']);
            for ($i = 0; $i < $count_files; $i++){

                $this->photo    = $user_id.'-'.rand(0, 999999).$file['name'][$i];
                $this->size     = $file['size'][$i];
                $this->type     = $file['type'][$i];
                $this->tmp_path = $file['tmp_name'][$i];
                $this->error_msg= $file['error'][$i];

                if($this->size > 4194304){
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

                        global $database;
                        global $session;
                        $sql = "INSERT INTO photo (photo,caption,type,size,user_id,post_id) ";
                        $sql .= " VALUES('$this->photo','$this->photo','$this->type','$this->size','$user_id','$post_id')";
                        $database->query($sql);


                       } else {
                        $this->setError("Something went wrong. We could not upload the picture/s");
                    }
                } else {
                    $this->setError("Errors are still in effect. Please resolve them and after try to upload the pictures");
                }


            }
    }


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

    public function isFeatured($file,$user_id,$post_id = NULL){

        var_export($file);

        $this->photo    = $user_id.'-'.rand(0, 999999).$file['name'];
        $this->size     = $file['size'];
        $this->type     = $file['type'];
        $this->tmp_path = $file['tmp_name'];
        $this->error_msg= $file['error'];

        if($this->size > 4194304){
            $this->setError("The file $this->photo is larger than 4 MB");
        }

        if(file_exists($this->upload_directory.$this->photo)){
            $this->setError("The file $this->photo already exists on the server. Consider changing the name");
        }

//        if($this->error_msg != 4 && $this->error_msg == 0){
//            $this->setError("$this->error_msg");
//        }

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
                echo "Error while uploading !!!";
            }
        }
    }








} // end of class