<?php
namespace App;

class Like
{

    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function like($users_id, $articles_id)
    {
        $stmt = $this->connect->prepare("INSERT INTO likes(users_id, articles_id) VALUES('$users_id','$articles_id')");
        $stmt->bindParam('users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam('articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function notification($data)
    {
        $stmt = $this->connect->prepare("INSERT INTO notification(users_id, action, target_type, target_id, target_user_id, date, target_pic_url) VALUES(:users_id, :action, :target_type, :target_id, :target_user_id, :date, :target_pic_url)");
        $stmt->bindParam(":users_id", $data['users_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":action", $data['action'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_type", $data['target_type'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_id", $data['target_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":target_user_id", $data['target_user_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":date", $data['date'], \PDO::PARAM_INT);
        $stmt->bindParam(":target_pic_url", $data['target_pic_url'], \PDO::PARAM_INT);
        $stmt->execute();
    }

//    public function get()
//    {
//
//    }
//
//    public function insert()
//    {
//
//    }
//
//    public function update()
//    {
//
//    }
//
//    public function delete()
//    {
//
//    }
}