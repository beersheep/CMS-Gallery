<?php 

require_once("db_connect.php");

class Database {

	Private $connection;

	public function open_db_connection() {

		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		if(mysqli_connect_errno()){

			die("Database connection failed" . mysqli_error());
		}

	}

	}

$database = New Database();
$database->open_db_connection();








 ?>