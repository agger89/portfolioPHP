<?php
    class Profile{

        protected $connect;

        public function __construct(PDO $connect){
            $this->connect = $connect;
        }

        public function authors($nickname){
            $stmt = $this->connect->prepare('SELECT * FROM users WHERE nickname = :nickname');
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function articles($nickname)
        {
            $stmt = $this->connect->prepare("SELECT articles.id, pics.url FROM pics LEFT JOIN articles ON pics.articles_id = articles.id LEFT JOIN users ON articles.users_id = users.id WHERE nickname = :nickname ORDER BY articles.id DESC");
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->execute();

            $rows = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $rows[] = $row;
            }
            return $rows;
        }

    }
?>

