<?php 

class Connection 
{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "gameCode";

    private static $connection;

    public static function connect()
    {
        try 
        {
            self::$connection = new PDO("mysql:host=".self::$host.";dbname=".self::$database."", self::$username, self::$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$connection;
        } 
        catch (PDOException $e)
        {
            print($e->getMessage());
        }
    }
}