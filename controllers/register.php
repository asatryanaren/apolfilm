<?php
require_once "controllers/connect.php";


$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
$passConfirm = filter_var(trim($_POST["confirmPassword"]), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Не допустимая длина логина";
    exit();
} elseif (mb_strlen($pass) < 3 || mb_strlen($pass) > 10) {
    echo "Не допустимая длина паролья ( от 3 до 10 )";
    exit();
} elseif ($pass != $passConfirm) {
    echo "Подтверждение паролья не совпадает";
    exit();
} elseif (mb_strlen($name) < 2 || mb_strlen($name) > 30) {
    echo "Не допустимая длина имени";
    exit();
}

$pass = md5($pass."adsax655");


$mysql->query("INSERT INTO `regist_users` (`login`, `pass`, `name`) VALUES ('$login','$pass','$name')");

$mysql->close();

header("Location: ../view/login.tpl.php");