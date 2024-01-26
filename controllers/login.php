<?php

$login = filter_var(trim($_POST["email"]));
$pass = filter_var(trim($_POST["password"]));

if (mb_strlen($login) != 0 || mb_strlen($pass) != 0) {
    $pass = md5($pass."adsax655");
    $mysql = new mysqli("localhost", "root", "", "my_films");
    $result = $mysql->query("SELECT * FROM `regist_users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();

    if ($user != null){
        if (count($user) == 0) {
            echo "Такой пользователь не найден";
            exit();
        }
    }

    setcookie("user", $user["name"], time() + 3600, "/");

    $mysql->close();
    header("Location: /");
}





