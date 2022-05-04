<?php

class Database
{
    //DB Param
    private $host = "localhost";
    private $db_name = "joblister";
    private $username = "root";
    private $password = "";
    //Set Options
    private $options = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    private $conn;

    //DB Connect
    public function connect(): PDO
    {
        //PDO Instance
        try
        {
            //set dsn
            $dsn = "mysql:host=$this->host;dbname=$this->db_name";
            $this->conn = new PDO($dsn,$this->username,$this->password,$this->options);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        return $this->conn;
    }

}