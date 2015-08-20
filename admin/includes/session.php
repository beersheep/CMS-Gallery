<?php 

Class Session{

	private $signed_in;
	public  $user_id;

	function __construct(){

	session_start();




	}

}

$session = new Session();

 ?>