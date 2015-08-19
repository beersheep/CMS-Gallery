<?php 

class User{

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;


	public static function find_all_users(){


		return self::find_query("SELECT * FROM users");
		
	}

	public static function find_users_by_id($id){

		$result_set = self::find_query("SELECT * FROM users Where id = $id LIMIT 1");
		$found_user = mysqli_fetch_array($result_set);
		return $found_user;
	}

	private static function find_query($sql){

		global $database;
		$result_set = $database->query($sql);
		return $result_set;
	}


}

 ?>