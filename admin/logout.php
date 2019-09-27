<?php

include("includes/header.php");


$session->logout();
$session->message('You have been successfully logged out!');

redirect("login.php");
