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
		//self::$databaseName = $databaseName; //Assigned above instead of passed to the method
		self::$conn = new mysqli(self::$hostName, self::$userName, self::$password, self::$databaseName );
		if (self::$conn->connect_error) {
			return("Connect Error to " . self::$hostName); //return error condition
        }
		return("Connection successful to hostName = " . self::$hostName . ", databaseName = " . self::$databaseName); //return success statement
   				
	}
}

?>