<?php

class ConnectDB {
    private $hostName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dataBase = "my_films";
    private static $instance = null;
    private $connection;

    public function __construct(){
        $this->connection = new mysqli($this->hostName, $this->userName, $this->password,$this->dataBase);
        if ($this->connection->connect_error){
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public static function getInstance () {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getConnect() {
        return $this->connection;
    }

    private function __clone(){}
    private function __wakeup(){}
}