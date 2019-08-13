<?php include("includes/header.php"); ?>

<?php

$commentNewCount = $_POST['commentNewCount'];
$user= Users::findByQuery("SELECT * FROM users LIMIT $commentNewCount");

 foreach ($user as $usera){

         echo $usera->username;
         echo $usera->role;
 } ?>