<?php 

class Connection 
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "gameCode";
    }

    public function connect()
    {
        try 
        {
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database."", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } 
        catch (PDOException $e)
        {
            print($e->getMessage());
        }
    }
}