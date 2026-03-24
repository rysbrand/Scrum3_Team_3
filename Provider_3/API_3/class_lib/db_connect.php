<?php

class DB_Access
{
    private static $hostName = "localhost";
    private static $databaseName = "study_service";
    private static $userName = "root";
    private static $password = "";

   public function connectTo()
	{
		$conn = new mysqli(
			self::$hostName,
			self::$userName,
			self::$password,
			self::$databaseName
		);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
	}
}
?>