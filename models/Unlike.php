<?php
    class Unlike{

        protected $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function unlike($users_id, $articles_id)
        {
            $stmt = $this->connect->prepare("DELETE FROM likes WHERE users_id = :users_id AND articles_id = :articles_id");
            $stmt->bindParam('users_id', $users_id, PDO::PARAM_INT);
            $stmt->bindParam('articles_id', $articles_id, PDO::PARAM_INT);
            $stmt->execute();
        }

    }
?>