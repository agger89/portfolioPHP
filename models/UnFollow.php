<?php
    class UnFollow
    {
        protected $connect;

        public function __construct($connect)
        {
            $this->connect = $connect;
        }

        public function unfollowReg($follow_nickname, $users_id)
        {
            $stmt = $this->connect->prepare("DELETE FROM follow WHERE follow_nickname = :follow_nickname AND users_id = :users_id");
            $stmt->bindParam(":follow_nickname", $follow_nickname, PDO::PARAM_STR);
            $stmt->bindParam(":users_id", $users_id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
?>