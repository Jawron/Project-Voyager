<?php


class Main_object {

    public $errors = [];
    public $upload_errors_array = [
        UPLOAD_ERR_OK => 'There is no error',
        UPLOAD_ERR_INI_SIZE => 'Bigger than the upload_max_filesize directive',
        UPLOAD_ERR_FORM_SIZE => 'The upload exceeds the MAX_FILE_SIZE',
        UPLOAD_ERR_PARTIAL => 'The upload file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary directory.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write on disk',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
    ];

    public static function clean($string){
        return htmlentities($string);
    }

    public static function displayValidationErrors($error){
        if(is_array($error)){
            foreach ($error as $single_e){
                $errors = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    $single_e
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                       <span aria-hidden=\"true\">&times;</span>
                    </button>
               </div>";
                return $errors;
            }
        } else {
            $errors = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    $error
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                       <span aria-hidden=\"true\">&times;</span>
                    </button>
               </div>";
            return $errors;
        }



    }

    public static function findAll(){
        return static::findByQuery("SELECT * FROM " .static::$db_table . " ");
    }

    public static function findById($id){
        global $database;
        $the_result_array = static::findByQuery("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public static function findByQuery($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = static::initiation($row);

        }

        return $the_object_array;

    }


    private function hasTheAtribute($property){

        // $object_properties = get_object_vars($this);

        // return array_key_exists($the_attribute, $object_properties);

        return property_exists($this, $property);
    }


    public static function initiation($record){
        //gets the class called
        //and loops thru the attributes and assigns values
        //after that return an array with attributes as keys and values as values  (associative array)

        $calling_class = get_called_class();


        $the_object = new $calling_class;


        foreach ($record as $the_attribute => $value) {

            if($the_object->hasTheAtribute($the_attribute)) {

                $the_object->$the_attribute = $value;


            }


        }

        return $the_object;
    }



    protected function properties() {
        //return get_object_vars($this);
        $properties = array();

        foreach (static::$db_table_fields  as $db_field) {

            if(property_exists($this, $db_field)) {

                $properties[$db_field] = $this->$db_field;

            }

        }

        return $properties;

    }

    protected function cleanProperties(){
        global $database;


        $clean_properties = array();


        foreach ($this->properties() as $key => $value) {

            $clean_properties[$key] = $database->escapeString($value);


        }

        return $clean_properties ;

    }

    public function save(){
        return isset($this->id) ? $this->update(): $this->create() ;
    }

    public function create() {
        global $database;

        $properties = $this->cleanProperties();



        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";


        if($database->query($sql)) {

            $this->id = $database->theInsertId();

            global $session;

            return true;

        } else {


            return false;


        }


    }

    public function update(){
        global $database;

        $properties = $this->cleanProperties();
        unset($properties['id']);

        foreach ($properties as $key => $val) {

            $properties_pairs[] = "{$key}='{$val}'";
        }


        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(",", $properties_pairs);
        $sql .= " WHERE id = " . $database->escapeString($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        //the method confirms if some changes were made in the database row and returns true(1)
    }

    public function delete(){
        global $database;
        $sql = "DELETE FROM " . static::$db_table ." WHERE id =  ". $database->escapeString($this->id) . " LIMIT 1";


        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false ;
    }



}