<?php 

Class Session{

	private $signed_in;
	public  $user_id;

	function __construct(){
	session_start();

	}

	private function check_login(){

		if(isset($_session['user_id'])) {
			$this->user_id = $_session['user_id'];
			$this->signed_in = true;
		} else {

			unset($this->user_id);
			$this->sign_in = false;
		}
	}

}

$session = new Session();

 ?>