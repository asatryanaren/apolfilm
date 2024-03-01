<?php

require_once "ConnectDB.php";
require_once "AbstractDBclass.php";

class FilterCategories extends AbstractDBclass {
    private $connect;
    private $DB;
    private $genre;
    public function __construct () {
        $instanceConnect = new ConnectDB();
        $this->connect = $instanceConnect->getConnect();
        $this->genre = $_GET["genre"];
        $this->DB = $this->connect->query("SELECT DISTINCT films.* FROM films INNER JOIN films_genre ON films.id = films_genre.id_film
                                    INNER JOIN genre ON films_genre.id_genre = genre.id WHERE genre.genre = '$this->genre';");
        $this->connect->close();

    }
    public function selectDB () {
        return $this->DB;
    }
    public function selectGenre () {
        return $this->genre;
    }
}