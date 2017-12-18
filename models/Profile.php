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

        public function follower($nickname)
        {
            $stmt = $this->connect->prepare('SELECT users.name,nickname, follow.follow_nickname FROM users JOIN follow ON users.id = follow.users_id WHERE nickname = :nickname');
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function followerLogin($nickname, $follow_nickname)
        {
            $stmt = $this->connect->prepare('SELECT users.name, follow.follow_nickname FROM users JOIN follow ON users.id = follow.users_id WHERE nickname = :nickname AND follow_nickname = :follow_nickname');
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->bindParam(':follow_nickname', $follow_nickname, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

