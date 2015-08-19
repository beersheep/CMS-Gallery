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

	public static function find_query($sql){

		global $database;
		$result_set = $database->query($sql);
		return $result_set;
	}

	public static function instantiation($found_user){

		#becuase it's in the User class, so use self to sub
		$object = new self;

        $object->id = $found_user['id'];
		$object->username = $found_user['username'];
		$object->first_name = $found_user['first_name'];           
	 	$object->last_name = $found_user['last_name'];

	 	return $object;


	}

}

 ?>