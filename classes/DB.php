<?php

namespace Classes;

class DB
{
    private $connection;

    public function __construct($host, $username, $pass, $dbName, $port)
    {
        try {
            $this->connection = new \PDO("mysql:host=".$host.";dbname=".$dbName.";port=".$port, $username, $pass);
            // set the PDO error mode to exception
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}