<?php 

Class Session{

	private $signed_in = false;
	public  $user_id;

	function __construct(){
	session_start();
	$this->check_login();

	}

	public function is_signed_in(){
		#this is a getter method
		return $this->signed_in;
	}

	public function login($user){

		if($user) {

			$this->user_id = $_session['user_id'] = $user->id;
			$this->signed_in = true;
		}

	}

	public function logout(){

		unset($_session['user_id']);
		unset($this->user_id);
		$this->signed_in = false;

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