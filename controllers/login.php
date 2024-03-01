<?php
    require_once "../model/ConnectDB.php";
    require_once "../model/Log.php";

    class Login {
        private $login;
        private $pass;
        private $loginDB;
        public function __construct () {
            $this->login = filter_var(trim($_POST["email"]));
            $this->pass = filter_var(trim($_POST["password"]));
            $this->loginDB = new Log();
        }
        public function loginUser () {
            if (mb_strlen($this->login) != 0 || mb_strlen($this->pass) != 0) {
                $this->pass = md5($this->pass."adsax655");

                $user = $this->loginDB->loginUserDB($this->login, $this->pass)->fetch_assoc();

                if ($user != null){
                    if (count($user) == 0) {
                        echo "Такой пользователь не найден";
                        exit();
                    }
                }

                setcookie("user", $user["name"], time() + 3600, "/");

                if (!empty($user)) {
                    header("Location: /");
                }else{
                    header("Location: ../view/login.tpl.php");
                }
            }
        }

    }
    $login = new Login();
    $login->loginUser();



