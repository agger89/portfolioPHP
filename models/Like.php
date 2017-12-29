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
}