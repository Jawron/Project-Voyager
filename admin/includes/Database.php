<?php
require_once ('config.php');

class Database {

    public $connection;

    function __construct(){ //
        $this->openDbConnection();
    }

    // Sets the property $connection to an instance of an object (mysqli)
    public function openDbConnection() {

        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno){
            die("Database Connection failed ". $this->connection->connect_errno);
        }

    }

    public function query($sql){

        $result = $this->connection->query($sql); // $this->connection->query($sql) is an method of the mysqli object , not the funtcion itself
        $this->confirmQuery($result);

        return $result;

    }
    // Checks if the result returned TRUE and if not returns an error
    private function confirmQuery($result) {
        if(!$result){
            die("Query Failed -> ". $this->connection->error);
        }

    }
    // Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
    public function escapeString($string){

        $escaped_string =  $this->connection->real_escape_string($string);

        return $escaped_string;

    }

    public function theInsertId(){
        return mysqli_insert_id($this->connection);
    }




}

$database = new Database();