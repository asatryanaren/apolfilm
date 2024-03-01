<?php

require_once "model/AbstractDBclass.php";
require_once "model/ConnectDB.php";

class BestMovies extends AbstractDBclass {
    private $connect;
    private $DB;
    private $reatingNumber = 6;
    public function __construct () {
        $instanceConnect = new ConnectDB();
        $this->connect = $instanceConnect->getConnect();
        $this->DB = $this->connect->query("SELECT films.*, AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) AS average_rating 
                                    FROM films INNER JOIN comments ON films.id = comments.id_comment
                                    GROUP BY films.id HAVING AVG(CASE WHEN comments.id_comment = films.id THEN comments.rating ELSE NULL END) > '$this->reatingNumber';");
        $this->connect->close();
    }
    public function selectDB () {
        return $this->DB;
    }
}