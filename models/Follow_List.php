<?php
    class Follow_List{

        protected $connect;

        public function __construct(PDO $connect){
            $this->connect = $connect;
        }

        public function follower($nickname){
            $stmt = $this->connect->prepare('SELECT users.name,nickname,profile_pic, follow.follow_name,follow_nickname FROM users JOIN follow ON users.id = follow.users_id WHERE nickname = :nickname');
            $stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

