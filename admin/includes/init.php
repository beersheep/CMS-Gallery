<?php 

error_reporting(0);

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
define("SITE_ROOT", DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'CMS');

defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT.DS.'admin'.DS."includes");

require_once("function.php"); //autoload function
require_once("db_connect.php"); //connection
require_once("database.php"); 
require_once("user.php");
require_once("session.php");
require_once("db_object.php");
require_once("photo.php");


 ?>