<?php
    class Write{

        protected $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function articles()
        {
            $users_id = $_SESSION['id'];
            $stmt = $this->connect->prepare("INSERT INTO articles(users_id) VALUES('$users_id')");
            $stmt->execute();
        }

        public function usersId($users_id)
        {
            $stmt = $this->connect->prepare("SELECT id FROM articles WHERE users_id = :users_id");
            $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function uploadPic($articles_id, $url){
            $stmt = $this->connect->prepare("INSERT INTO pics(articles_id, url) VALUES(:articles_id, :url)");
            $stmt->bindParam(":articles_id", $articles_id);
            $stmt->bindParam(":url", $url);
            $stmt->execute();
        }
    }
?>