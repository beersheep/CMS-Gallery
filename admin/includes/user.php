	<?php 

class User{

	public $id;
	public $username;
	public $first_name;
	public $last_name;


	public static function find_all_users(){

		return self::find_query("SELECT * FROM users");
	}

	public static function find_users_by_id($id){

		$result_array = self::find_query("SELECT * FROM users Where id = $id LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}


	public static function find_query($sql){

		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while($row = mysqli_fetch_array($result_set)){

			$object_array[] = self::instantiation($row);
		}


		return $object_array;
	}

	public static function verify_user($username, $password){
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM users WHERE"; 
		$sql .= "username = '{$username}' "; 
		$sql .= "AND password = '{$password}' LIMIT 1";
		$result_array = Self::find_this_query($sql);

		return !empty($result_array) ? array_shift($result_array) : false ;

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

	 			$object->$attribute = $value;
	 		}

	 	}

	 	return $object;

	}	

	private function has_the_attribute($attribute){

		$object_properties = get_object_vars($this);

		return array_key_exists($attribute, $object_properties);
		// to check if the db attribute match the class properties

	}

}

 ?>