<?php 

class User{

	private $id;
	private $username;
	private $first_name;
	private$last_name;


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

	public static function instantiation($user_record){

		#becuase it's in the User class, so use self to sub
		$object = new self;

     	// $object->id = $found_user['id'];
		// $object->username = $found_user['username'];
		// $object->first_name = $found_user['first_name'];           
	 	// $object->last_name = $found_user['last_name'];

	 	foreach ($user_record as $attribute => $value) {

	 		if($object->has_the_attribute($attribute)) {

	 			$object->attribute = $value;
	 		}

	 	}

	 	return $object;


	}

}

 ?>