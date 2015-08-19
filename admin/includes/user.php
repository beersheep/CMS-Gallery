<?php 

class User{

	public static function find_all_users(){

		global $database;
		$result_set = $database->query("SELECT * FROM users");
		return $result_set;
	}

	public static function find_users_by_id($id){

		global $database;
		$result_set = $database->query("SELECT * FROM users Where id = $id");
		return $result_set;
	}



}

 ?>