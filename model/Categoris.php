<?php

require_once "model/ConnectDB.php";
require_once "model/AbstractDBclass.php";

class Categoris extends AbstractDBclass {
    private $connect;
    private $DB;
    public function __construct() {
        $instanceConnect = new ConnectDB();
        $this->connect = $instanceConnect->getConnect();
        $this->DB = $this->connect->query("SELECT genre.genre, COUNT(DISTINCT films_genre.id_film) AS count_films FROM genre
                                    INNER JOIN films_genre ON genre.id = films_genre.id_genre
                                    INNER JOIN films ON films.id = films_genre.id_film WHERE films.id = films_genre.id_film GROUP BY  genre.genre;");
        $this->connect->close();
    }

    public function selectDB (){
        return $this->DB;
    }
}