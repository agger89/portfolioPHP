<?php
namespace App;

class Follow
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function followReg($follow_id, $users_id, $datetime)
    {
        $stmt = $this->connect->prepare("INSERT INTO follow(follow_id, users_id, datetime) VALUES(:follow_id, :users_id, :datetime)");
        $stmt->bindParam(":follow_id", $follow_id, \PDO::PARAM_INT);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(":datetime", $datetime, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function notification($data)
    {
        $stmt = $this->connect->prepare("INSERT INTO notification(users_id, action, target_type, target_id) VALUES(:users_id, :action, :target_type, :target_id)");
        $stmt->bindParam(":users_id", $data['users_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":action", $data['action'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_type", $data['target_type'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_id", $data['target_id'], \PDO::PARAM_INT);
        $stmt->execute();
    }

}