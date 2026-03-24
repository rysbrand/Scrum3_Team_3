<?php

class DB_Access
{
    private static $hostName = "localhost";
    private static $databaseName = "study_service";
    private static $userName = "root";
    private static $password = "";
    private static $conn;

    public function connectTo()
    {
        self::$conn = new mysqli(
            self::$hostName,
            self::$userName,
            self::$password,
            self::$databaseName
        );

        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }

        return self::$conn;
    }

    public function displayRecords($tableName)
    {
        if (!self::$conn) {
            $this->connectTo();
        }

        $query = "SELECT * FROM $tableName";
        $result = mysqli_query(self::$conn, $query);

        return $result;
    }

    public function closeConnection()
    {
        if (self::$conn) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>