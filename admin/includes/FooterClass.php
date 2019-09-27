<?php


class FooterClass extends  Main_object {

    public $id;
    public $type;
    public $field_1;
    public $field_2;
    public $field_3;
    public $field_4;
    public $copyright;


    public function getType($type){
        switch ($type) {
            case 'one_column':
                include('footer_includes/one_column.php');
                break;
            case 'two_column':
                include('footer_includes/two_column.php');
                break;
            case 'three_column':
                include('footer_includes/three_column.php');
                break;
            case 'four_column':
                include('footer_includes/four_column.php');
                break;
            default :
                redirect("settings.php");
        }
    }

    public function findTypeDb(){
        global $database;

        $sql = "SELECT type FROM footer WHERE in_use = 'yes'";
        $row =  $database->query($sql);

        while ($result = mysqli_fetch_assoc($row)){
            return $result['type'];
        }

    }

    public function saveFooterType(){
        global $database;
        $sql = "UPDATE footer SET in_use = 'no' WHERE in_use = 'yes'";
        $database->query($sql);

        $sql = "UPDATE footer SET in_use = 'yes' WHERE type = '$this->type'";
        $database->query($sql);
    }

    public function saveFooterOneColumn(){
        global $database;
        $sql = "UPDATE footer SET in_use = 'no' WHERE in_use = 'yes'";
        $database->query($sql);

        $sql = "UPDATE footer SET field_1 = '".$database->escapeString($this->field_1)."',copyright = '".$database->escapeString($this->copyright)."', in_use = 'yes' WHERE type = '".$database->escapeString($this->type)."'";
        $database->query($sql);


    }

    public function saveFooterTwoColumn(){
        global $database;
        $sql = "UPDATE footer SET in_use = 'no' WHERE in_use = 'yes'";
        $database->query($sql);

        $sql = "UPDATE footer SET field_1 = '".$database->escapeString($this->field_1)."', field_2 = '".$database->escapeString($this->field_2)."', copyright = '".$database->escapeString($this->copyright)."', in_use = 'yes' WHERE type = '".$database->escapeString($this->type)."'";
        $database->query($sql);


    }

    public function saveFooterThreeColumn(){
        global $database;
        $sql = "UPDATE footer SET in_use = 'no' WHERE in_use = 'yes'";
        $database->query($sql);

        $sql = "UPDATE footer SET field_1 = '".$database->escapeString($this->field_1)."', field_2 = '".$database->escapeString($this->field_2)."', field_3 = '".$database->escapeString($this->field_3)."',copyright = '".$database->escapeString($this->copyright)."', in_use = 'yes' WHERE type = '".$database->escapeString($this->type)."'";
        $database->query($sql);


    }

    public function saveFooterFourColumn(){
        global $database;
        $sql = "UPDATE footer SET in_use = 'no' WHERE in_use = 'yes'";
        $database->query($sql);

        $sql = "UPDATE footer SET field_1 = '".$database->escapeString($this->field_1)."', field_2 = '".$database->escapeString($this->field_2)."',field_3 = '".$database->escapeString($this->field_3)."', field_4 = '".$database->escapeString($this->field_4)."', copyright = '".$database->escapeString($this->copyright)."',in_use = 'yes' WHERE type = '$this->type'";
        $database->query($sql);


    }

    public function returnFooterInfo($type){
        global $database;

        $sql = "SELECT * FROM footer WHERE type = '$type'";
        $row =  $database->query($sql);
        while($result = mysqli_fetch_assoc($row)){
            $this->type = $result['type'];
            $this->field_1 =  $result['field_1'];
            $this->field_2 =  $result['field_2'];
            $this->field_3 =  $result['field_3'];
            $this->field_4 =  $result['field_4'];
            $this->copyright = $result['copyright'];
        }

    }

    public function frontEndFooterInfo($type){
        switch ($type) {
            case 'one_column':
                include('includes/one_column.php');
                break;
            case 'two_column':
                include('includes/two_column.php');
                break;
            case 'three_column':
                include('includes/three_column.php');
                break;
            case 'four_column':
                include('ncludes/four_column.php');
                break;
            default :
                redirect("settings.php");
        }
    }

















}