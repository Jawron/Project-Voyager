<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT','C:' .DS. 'xampp' .DS. 'htdocs'.DS.'OOP');
// C:\xampp\htdocs\OOP
defined('INCLUEDS_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once("config.php");
require_once("Database.php");
require_once("Main_object.php");
require_once("Users.php");
require_once("Property.php");
require_once("functions.php");
require_once("Session.php");
require_once("Category.php");
//require_once("../Class/Mail_info.php");
require_once("Slider.php");
require_once("Photo.php");
require_once("FooterClass.php");

?>