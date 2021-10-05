<?php

namespace Classes;

class DB
{
    private $host;
    private $username;
    private $pass;
    private $dbName;
    private $port;

    private $connection;

    public function __construct($host, $username, $pass, $dbName, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->port = $port;

        try {
            $this->connection = new \PDO("mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbName, $this->username, $this->pass);
            // set the PDO error mode to exception
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMenu()
    {
        $sql = "SELECT * FROM menu";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

}