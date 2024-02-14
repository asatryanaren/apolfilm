<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    header("Location: ../admin.php");
}
require_once "connect.php";


$result = $mysql->query("SELECT films.*, GROUP_CONCAT(DISTINCT genre.genre SEPARATOR ', ') AS genres FROM films
                               LEFT JOIN films_genre ON films.id = films_genre.id_film LEFT JOIN genre ON films_genre.id_genre = genre.id
                                GROUP BY films.id;");

$name = $_POST["name"];
$rating = $_POST["rating"];
$img = $_POST["img"];
$genre = $_POST["genre"];
$descrip = $_POST["descrip"];
$grade = $_POST["grade"];


$genreMore = $_POST["genreMore"];
$genreMoreName = $_POST["genreMoreName"];

$nameDLT = $_POST["nameDLT"];
echo '<pre>';
print_r($genre);
echo '</pre>';

if (!empty($name) || !empty($descrip) || !empty($img)) {
   $res = $mysql->query("INSERT INTO `films`(`name`, `descriptions`, `img`, `id_comment`) VALUES ('$name','$descrip','$img', NULL );"); // chi ashxatum
    print_r($res);
    if ($res){
        $lastInsertedId = $mysql->insert_id;
        $mysql->query("INSERT INTO films_genre (id_genre, id_film) VALUES ('$genre','$lastInsertedId')");
    }
}
if (!empty($genre)) {
    $res = $mysql->query("SELECT films.id FROM films ");
    if ($res) {
        $lastInsertedId = $mysql->insert_id;
        $mysql->query("INSERT INTO films_genre (id_genre, id_film) VALUES ('$genre','$lastInsertedId')");
    }
}

if (!empty($genreMore) || !empty($genreMoreName)) {
    $res = $mysql->query("SELECT films.id FROM films WHERE films.name = '$genreMoreName'")->fetch_assoc();
    $filmId = $res["id"];
    if ($filmId) {
        $mysql->query("INSERT INTO films_genre (id_genre, id_film) VALUES ('$genreMore','$filmId')");
    }
}

if (!empty($nameDLT)) {
    $res = $mysql->query("SELECT films.id FROM films WHERE films.name = '$nameDLT';")->fetch_assoc();
    $filmId = $res["id"];
    if($filmId) {
        $mysql->query("SET FOREIGN_KEY_CHECKS=0;");
        $mysql->query("DELETE FROM films WHERE films.id = '$filmId';");
        $mysql->query("SET FOREIGN_KEY_CHECKS=1;");
    }
}