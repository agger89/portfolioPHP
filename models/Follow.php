<?php
    class Follow
    {
        protected $connect;

        public function __construct($connect)
        {
            $this->connect = $connect;
        }

        public function followReg($follow_nickname, $users_id, $follow_name)
        {
            $stmt = $this->connect->prepare("INSERT INTO follow(follow_nickname, users_id, follow_name) VALUES(:follow_nickname, :users_id, :follow_name)");
            $stmt->bindParam(":follow_nickname", $follow_nickname, PDO::PARAM_STR);
            $stmt->bindParam(":users_id", $users_id, PDO::PARAM_INT);
            $stmt->bindParam(":follow_name", $follow_name, PDO::PARAM_STR);
            $stmt->execute();
        }

    }
?>