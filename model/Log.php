<?php
    require_once "ConnectDB.php";

    class Log {
        private $connect;
        public function __construct () {
            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();
        }
        public function loginUserDB ($login,$pass) {
           return $this->connect->query("SELECT * FROM `regist_users` WHERE `login` = '$login' AND `pass` = '$pass'");
        }
    }
