<?php
require_once "connect.php";

$grade = $_POST["grade"];
$id = $_POST["id"];
$bodyComment = $_POST["bodyComment"];
$wrote = $_COOKIE["user"];
$date = date('Y-m-d H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($bodyComment) && !empty($grade) && !empty($wrote) ) {
echo $grade;
        $mysql->query("INSERT INTO `comments`(`comment`, `id_comment`, `wrote`, `date`, `rating`) VALUES ('$bodyComment', '$id', '$wrote', '$date', '$grade');");
    }
}
$mysql->close();

header("Location: ../oneMovie.php?id=$id" );