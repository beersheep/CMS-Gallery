	<?php 

class User extends Db_object {


	protected static $db_table = "users";
	protected static $db_table_field = array("username", "password", "first_name", "last_name");

	public $id;
	public $username;
	public $first_name;
	public $password;
	public $last_name;

	

	public static function verify_user($username, $password){
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM users WHERE username = 
		'${username}' AND password = '{$password}' LIMIT 1"; 
		// $sql .= "username = '{$username}' "; 
		// $sql .= "AND password = '{$password}' ";
		// $sql .= "LIMIT 1";
		$result_array = Self::find_query($sql);

		return !empty($result_array) ? array_shift($result_array) : false ;

	}


	





}  // End of Class user

	$user = new User();
	
 ?>