<?php


class Session {

    private $signed_in = false;
    public $user_id;
    public $user_cookie;
    public $user_role;
    public $message;
    public $count;


    function __construct(){
        session_start();
        $this->checkLogin();
        $this->checkMessage();
        $this->visitorCount();
    }

    public function message($msg = ""){
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    private function checkMessage () {
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    private function checkLogin(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            //$this->user_cookie = $_COOKIE['username'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function isSignedIn () {
        return $this->signed_in;
    }


    //takes a parameter as argument that is an array $user
    //then assigns it values to a session and the to the property
    //after it sets the property $signed_in to true
    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user;
            $this->signed_in = true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }


    public function visitorCount(){

        if(isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }

    }

}

$session = new Session;
$session_message = $session->message();