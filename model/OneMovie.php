<?php
    require_once "ConnectDB.php";

    class OneMovie {
        private $connect;
        private $filmDB;
        private $commentsDB;
        private $id;
        public function __construct () {
            $instanceConnect = new ConnectDB();
            $this->connect = $instanceConnect->getConnect();
            $this->id = $_GET["id"];
            $this->filmDB = $this->connect->query("SELECT films.*, GROUP_CONCAT(DISTINCT genre.genre SEPARATOR ', ') AS genres,
                                    AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) AS average_rating FROM films 
                                    LEFT JOIN films_genre ON films.id = films_genre.id_film 
                                    LEFT JOIN genre ON films_genre.id_genre = genre.id 
                                    LEFT JOIN comments ON films.id = comments.id_comment WHERE films.id = '$this->id' GROUP BY films.id;")->fetch_assoc();

            $this->commentsDB = $this->connect->query("SELECT comments.* FROM films LEFT JOIN comments ON films.id = comments.id_comment
                                            WHERE films.id = '$this->id' ORDER BY comments.date DESC;");
            $this->connect->close();
        }
        public function selectFilmDB () {
            return $this->filmDB;
        }
        public function selectCommentDB () {
            return $this->commentsDB;
        }
        public function selectId () {
            return $this->id;
        }
    }