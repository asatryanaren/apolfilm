<?php
    require_once "model/ConnectDB.php";
    require_once "model/AbstractDBclass.php";

    class Admin extends AbstractDBclass {
        private $connect;
        private $DB;
        private $DBClone;
        public function __construct () {
            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();
            $this->DB = $this->connect->query("SELECT genre.genre, genre.id FROM genre");
            $this->DBClone = $this->connect->query("SELECT genre.genre, genre.id FROM genre");
            $this->connect->close();
        }
        public function selectDB (){
                return $this->DB;
        }
        public function selectDBClone (){
            return $this->DBClone;
        }
    }