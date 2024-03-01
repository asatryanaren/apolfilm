<?php
    require_once "../model/ConnectDB.php";

    class Comments {
        private $grade;
        private $id;
        private $bodyComment;
        private $wrote;
        private $date;
        private $connect;
        public function __construct () {
            $this->grade = $_POST["grade"];
            $this->id = $_POST["id"];
            $this->bodyComment = $_POST["bodyComment"];
            $this->wrote = $_COOKIE["user"];
            $this->date = date('Y-m-d H:i:s');
        }
        public function addComments () {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($this->bodyComment) && !empty($this->grade) && !empty($this->wrote) ) {
                    $instanceConnect = new ConnectDB();
                    $this->connect = $instanceConnect->getConnect();
                    $this->connect->query("INSERT INTO `comments`(`comment`, `id_comment`, `wrote`, `date`, `rating`) 
                                                VALUES ('$this->bodyComment', '$this->id', '$this->wrote', '$this->date', '$this->grade');");
                }
            }
            $this->connect->close();

            header("Location: ../OneMovie.php?id=$this->id" );
        }
    }
    $comments = new Comments();
    $comments->addComments();