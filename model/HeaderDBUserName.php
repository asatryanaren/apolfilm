<?php
    session_start();
    require_once "ConnectDB.php";
    class HeaderDBUserName {
        private $connect;
        private $DB;
        public function __construct () {
            $this->DB = new ConnectDB();
        }
        public function getUserLoginName () {
            $this->connect = $this->DB->getConnect();
            $name = $_SESSION["user"];
            return $this->connect->query("SELECT regist_users.* FROM regist_users WHERE regist_users.name = '$name';")->fetch_assoc();
        }
    }