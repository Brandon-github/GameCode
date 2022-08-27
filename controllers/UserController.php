<?php

require './config/Connection.php';

class UserController 
{

    public static function getAll()
    {   
        try 
        {
            $sql = "SELECT id, firstname, lastname, username, password, photo FROM users";
            $response = Connection::connect()->prepare($sql);
            $response->execute();

            $data = $response->fetchAll();
            return $data;
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }

    public static function getById($id)
    {
        try 
        {
            $sql = "SELECT firstname, lastname, username, password, photo FROM users WHERE id = $id";
            $response = Connection::connect()->prepare($sql);
            $response->execute();
            
            $data = $response->fetch();
            return $data;
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }

    public static function create($user)
    {
        try 
        {
            $sql = "INSERT INTO users(firstname, lastname, username, password, photo) VALUES('".$user["firstname"]."', '".$user["lastname"]."', '".$user["username"]."', '".$user["password"]."', '".$user["photo"]."')";
            $response = Connection::connect();
            $response->exec($sql);
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }

    public static function update($id, $data)
    {
        try 
        {
            $sql = "UPDATE users SET firstname = '".$data['firstname']."', lastname = '".$data['lastname']."', username = '".$data['username']."', password = '".$data['password']."', photo = '".$data['photo']."' WHERE id = $id";
            $response = Connection::connect();
            $response->exec($sql);
        }
        catch (PDOException $e)
        {
            print($e->getMessage()."\n".$e);
        }
    }
}