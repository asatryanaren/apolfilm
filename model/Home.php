<?php
    require_once "ConnectDB.php";
    require_once "AbstractDBclass.php";

    class Home extends AbstractDBclass {
        private $connect;
        private $DB;
        public function __construct () {
            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();
            $this->DB = $this->connect->query("SELECT films.*, GROUP_CONCAT(DISTINCT genre.genre SEPARATOR ', ') AS genres, 
                                        AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) AS average_rating FROM films 
                                        LEFT JOIN films_genre ON films.id = films_genre.id_film 
                                        LEFT JOIN genre ON films_genre.id_genre = genre.id
                                        LEFT JOIN comments ON films.id = comments.id_comment GROUP BY films.id;");
            $this->connect->close();
        }
        public function selectDB () {
            return $this->DB;
        }
    }