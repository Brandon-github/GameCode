<?php

require './config/Connection.php';

class UserController 
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function getAll()
    {   
        try 
        {
            $sql = "SELECT id, firstname, lastname, username, password, photo FROM users";
            $response = $this->connection->connect()->prepare($sql);
            $response->execute();

            $data = $response->fetchAll();
            return $data;
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }

    public function getById($id)
    {
        try 
        {
            $sql = "SELECT firstname, lastname, username, password, photo FROM users WHERE id = $id";
            $response = $this->connection->connect()->prepare($sql);
            $response->execute();
            
            $data = $response->fetch();
            return $data;
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }

    public function create($user)
    {
        try 
        {
            $sql = "INSERT INTO users(firstname, lastname, username, password, photo) VALUES('".$user["firstname"]."', '".$user["lastname"]."', '".$user["username"]."', '".$user["password"]."', '".$user["photo"]."')";
            $response = $this->connection->connect();
            $response->exec($sql);
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }
}