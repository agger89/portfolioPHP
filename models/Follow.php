<?php
namespace App;

class Follow
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function followReg($follow_id, $users_id)
    {
        $stmt = $this->connect->prepare("INSERT INTO follow(follow_id, users_id) VALUES(:follow_id, :users_id)");
        $stmt->bindParam(":follow_id", $follow_id, \PDO::PARAM_INT);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->execute();
    }

}