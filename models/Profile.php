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

    public function articles($users_id, $limitIdx, $pageSet)
    {
        $stmt = $this->connect->prepare("SELECT id FROM articles WHERE users_id = :users_id ORDER BY articles.id DESC LIMIT :limitIdx, :pageSet");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(':limitIdx', $limitIdx, \PDO::PARAM_INT);
        $stmt->bindParam(':pageSet', $pageSet, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function pics($id)
    {
        $stmt = $this->connect->prepare('SELECT id, url FROM pics WHERE id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
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

    public function countArticle($users_id)
    {
        $stmt = $this->connect->prepare('SELECT COUNT(*) FROM articles WHERE users_id = :users_id');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}