<?php

class DB_Access
{
    private static $conn;
	private static $hostName = "localhost";
	private static $databaseName = "study_service";
	private static $userName = "root";
	private static $password = "";

    public function connectTo()
    {
		
		self::$conn = new mysqli(self::$hostName, self::$userName, self::$password, self::$databaseName );
		if (self::$conn->connect_error) {
			return("Connect Error to " . self::$hostName);
        }
		return("Connection successful to hostName = " . self::$hostName . ", databaseName = " . self::$databaseName);
   				
	}
}

?>