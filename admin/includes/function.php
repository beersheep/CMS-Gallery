<?php 

function __autoload($classes) {

$classes = strtolower($classes);

$path = "includes/{$classes}.php";

if(file_exists($path)){

	include_once($path);

} else {
	die("No {$classes}.php found.");	
	}

}

function redirect($location){
   
   header("Location: $location");

}

 ?>