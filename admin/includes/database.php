<?php 

require_once("db_connect.php");

class Database {

	public $connection;

	function __construct(){
			$this->open_db_connection();
	}	

	public function open_db_connection() {

		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		if($this->connection->connect_errno){

			die("Database connection failed" . mysqli_error($this->connection));
		}

	}

	public function query($sql){

		$result = mysqli_query($this->connection, $sql) or die("Error: ".mysqli_error($this->connection));
		return $result;

	}

	private function confirm_query($result){
		if(!$result){
			die("Query failed");
		}
	}

	public function escape_string($string){

		$escape_string = mysqli_real_escape_string($this->connection, $string);
		return $escape_string;

	}

	public function insert_id(){

		return mysqli_insert_id($this->connection);

	}

	}

$database = New Database();









 ?>