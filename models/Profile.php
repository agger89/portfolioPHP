<?php
namespace App;

class Profile{

    protected $connect;

    public function __construct(\PDO $connect)
    {
        $this->connect = $connect;
    }

    public function authors($id)
    {
        $stmt = $this->connect->prepare('SELECT id, name, nickname, profile_pic FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function articles($users_id)
    {
        $stmt = $this->connect->prepare("SELECT articles.id, pics.url FROM pics LEFT JOIN articles ON pics.articles_id = articles.id LEFT JOIN users ON articles.users_id = users.id WHERE users_id = :users_id ORDER BY articles.id DESC");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        $rows = array();
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function follower($users_id)
    {
        $stmt = $this->connect->prepare('SELECT users.name,nickname, follow.follow_id FROM users JOIN follow ON users.id = follow.users_id WHERE users_id = :users_id');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function followerLogin($users_id, $follow_id)
    {
        $stmt = $this->connect->prepare('SELECT users.name, follow.follow_id FROM users JOIN follow ON users.id = follow.users_id WHERE users_id = :users_id AND follow_id = :follow_id');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(':follow_id', $follow_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function member()
    {
        $stmt = $this->connect->prepare('SELECT * FROM users');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}