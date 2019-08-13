<?php



include('includes/header.php');

require("../vendor/autoload.php");

$users = new Users;
$users->sentMail("lapos.alexgabriel@gmail.com","Activate account","Please click the link below to activate your account");





include('includes/footer.php');?>
