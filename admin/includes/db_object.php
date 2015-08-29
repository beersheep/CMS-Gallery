<?php 

class Db_object {

	public static function find_all(){

		return static::find_query("SELECT * FROM " .static::$db_table ." ");
	}

	public static function find_by_id($id){

		$result_array = static::find_query("SELECT * FROM " .static::$db_table . " Where id = $id LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false ;
	}

		public static function find_query($sql){

		global $database;
		$result_set = $database->query($sql);


		
		$object_array = array();

		while($row = mysqli_fetch_array($result_set)){
			$object_array[] = static::instantiation($row);
		}

		return $object_array;
	}

		public static function instantiation($user_record){

		$calling_class = get_called_class();

		$object = new $calling_class;

     	// $object->id = $found_user['id'];
		// $object->username = $found_user['username'];
		// $object->first_name = $found_user['first_name'];           
	 	// $object->last_name = $found_user['last_name'];

	 	foreach ($user_record as $attribute => $value) {

	 		if($object->has_the_attribute($attribute)) {
	 			$object->$attribute = $value;
	 		}

	 	} return $object; 
	 }	

	private function has_the_attribute($attribute){

		$object_properties = get_object_vars($this);

		return array_key_exists($attribute, $object_properties);
		// to check if the db attribute match the class properties

	}



		public function save(){
		return isset($this->id) ? $this->update() : $this->create();


		
	}

	public function create() {
		global $database;

		$properties = $this->clean_properties();

		$sql = "INSERT INTO ". static::$db_table ."(".implode(",", array_keys($properties)).")";
		$sql .= "VALUES ('" .implode("','", array_values($properties))."')";
		

		if ($database->query($sql)) {

			$this->id = $database->insert_id();

			return true;

		} else {

			return false;
		}

	}  // Create Method

	public function update() {
		global $database;

		$properties = $this->clean_properties();

		$property_pairs = array();

		foreach ($properties as $key => $value) {
			$property_pairs[] = "{$key}= '{$value}' ";
		}


		$sql = "UPDATE ". static::$db_table ." SET ";
		$sql .= implode(", ", $property_pairs);
		$sql .= " WHERE ID= " . $database->escape_string($this->id);

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : die("Update failed".mysqli_error($database->connection));

 
	} // update method

	public function delete() {
		global $database;

		$sql = "DELETE FROM ". static::$db_table ."";
		$sql .= " WHERE id= ".$database->escape_string($this->id);
		$sql .= " LIMIT 1";

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;

	} // delete method

	protected function properties() {

		$properties = array();

		foreach (static::$db_table_field as $field) {
			if (property_exists($this, $field)){
				$properties[$field] = $this->$field;
			}
		}
			return $properties;

	} // properties method

	protected function clean_properties(){
		global $database;

		$escape_properties = array();

		foreach ($this->properties() as $key => $value) {
			
			$escape_properties[$key] = $database->escape_string($value);

		}

		return $escape_properties;


	} // clean properties

} // end Class





 ?>