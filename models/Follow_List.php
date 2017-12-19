<?php
    class Follow_List{

        protected $connect;

        public function __construct(PDO $connect){
            $this->connect = $connect;
        }

        public function follower($users_id){
            $stmt = $this->connect->prepare('SELECT users.name,nickname,profile_pic, follow.follow_id FROM users JOIN follow ON users.id = follow.follow_id WHERE users_id = :users_id');
            $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

