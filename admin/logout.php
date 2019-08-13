<?php

include("includes/header.php");
require_once("includes/init.php");


$session->logout();
$session->message('You have been successfully logged out!');

redirect("login.php");
