<?php
    require_once __DIR__ . "/../model/RegistDB.php";

    class Register {
        private $login;
        private $pass;
        private $passConfirm;
        private $name;
        private $registDB;
        public function __construct () {
            $this->login = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
            $this->pass = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
            $this->passConfirm = filter_var(trim($_POST["confirmPassword"]), FILTER_SANITIZE_STRING);
            $this->name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);

            $this->registDB = new RegistDB();

        }
        public function registerUser () {
            if (mb_strlen($this->login) < 5 || mb_strlen($this->login) > 90) {
                exit();
            } else if (mb_strlen($this->pass) < 3 || mb_strlen($this->pass) > 10) {
                exit();
            } elseif ($this->pass != $this->passConfirm) {
                exit();
            } elseif (mb_strlen($this->name) < 2 || mb_strlen($this->name) > 30) {
                exit();
            }
            $this->registDB->registUserData($this->login,$this->pass,$this->name);
            echo json_encode(["success" => true]);
            exit();
        }
    }

    if ( $_SERVER['REQUEST_METHOD'] === "POST"){
        $regis = new Register();
        $regis->registerUser();
    }