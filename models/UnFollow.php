<?php
namespace App;

class UnFollow
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function unfollowReg($follow_id, $users_id)
    {
        $stmt = $this->connect->prepare("DELETE FROM follow WHERE follow_id = :follow_id AND users_id = :users_id");
        $stmt->bindParam(":follow_id", $follow_id, \PDO::PARAM_INT);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}