<?php

require_once "../model/ConnectDB.php";

    class AdminPage {
        private $name;
        private $rating;
        private $img;
        private $genre;
        private $descrip;
        private $grade;
        private $genreMore;
        private $genreMoreName;
        private $nameDLT;
        private $connect;

        public function __construct () {
            $this->name = $_POST["name"];
            $this->rating = $_POST["rating"];
            $this->img = $_POST["img"];
            $this->genre = $_POST["genre"];
            $this->descrip = $_POST["descrip"];
            $this->grade = $_POST["grade"];

            $this->genreMore = $_POST["genreMore"];
            $this->genreMoreName = $_POST["genreMoreName"];

            $this->nameDLT = $_POST["nameDLT"];

            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();

        }
        public function addFilm ($name, $genre, $description, $img) {
            if (!empty($this->name) || !empty($this->descrip) || !empty($this->img)) {
                $res = $this->connect->query("INSERT INTO `films`(`name`, `descriptions`, `img`, `id_comment`) VALUES ('$name','$description','$img', NULL );");
                if ($res){
                    $lastInsertedId = $this->connect->insert_id;
                    $this->connect->query("INSERT INTO films_genre (id_genre, id_film) VALUES ('$genre','$lastInsertedId')");
                }

                $this->connect->close();
            }
        }

        public function deleteFilm ($name) {
            if (!empty($this->nameDLT)) {
                $res = $this->connect->query("SELECT films.id FROM films WHERE films.name = '$name';")->fetch_assoc();
                $filmId = $res["id"];
                if($filmId) {
                    $this->connect->query("SET FOREIGN_KEY_CHECKS=0;");
                    $this->connect->query("DELETE FROM films WHERE films.id = '$filmId';");
                    $this->connect->query("SET FOREIGN_KEY_CHECKS=1;");
                }
            }
        }
        public function addGenreMore ($genreMore,$genreMoreName) {
            if (!empty($this->genreMore) || !empty($this->genreMoreName)) {
                $res = $this->connect->query("SELECT films.id FROM films WHERE films.name = '$genreMoreName'")->fetch_assoc();
                $filmId = $res["id"];
                if ($filmId) {
                    $this->connect->query("INSERT INTO films_genre (id_genre, id_film) VALUES ('$genreMore','$filmId')");
                }
            }
        }

        public function checkRequest() {
            if($_POST["method"] === "filmAdd"){
                $this->addFilm($this->name, $this->genre, $this->descrip, $this->img);
            }elseif ($_POST["method"] === "addGenreMore") {
                $this->addGenreMore($this->genreMore, $this->genreMoreName);
            }elseif ($_POST["method"] === "filmDelete") {
                $this->deleteFilm($this->nameDLT);
            }
        }
    }

class GetPostMethod {
    public function get () {
        if (isset($_POST["method"]) && $_POST["method"] == "filmAdd") {
            $adminPage = new AdminPage();
            $adminPage->checkRequest();
        } elseif (isset($_POST["method"]) && $_POST["method"] == "addGenreMore") {
            $adminPage = new AdminPage();
            $adminPage->checkRequest();
        } elseif (isset($_POST["method"]) && $_POST["method"] == "filmDelete") {
            $adminPage = new AdminPage();
            $adminPage->checkRequest();
        }
    }
}

$get = new GetPostMethod();
$get->get();