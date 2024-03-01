<?php
    require_once "ConnectDB.php";

    class RegistDB {
        private $connect;
        public function __construct () {
            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();
        }
        public function registUserData ($login,$pass,$name) {
            $pass = md5($pass."adsax655");
            $this->connect->query("INSERT INTO `regist_users` (`login`, `pass`, `name`) VALUES ('$login','$pass','$name')");
        }
    }