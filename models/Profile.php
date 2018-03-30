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
        $stmt = $this->connect->prepare('SELECT id, email, name, nickname, profile_pic FROM users WHERE id = :id');
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
        $stmt = $this->connect->prepare('SELECT users.name,nickname,profile_pic, follow.follow_id FROM users JOIN follow ON users.id = follow.follow_id WHERE users_id = :users_id');
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

    public function userNotfollower($users_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE id NOT IN (SELECT follow_id FROM follow WHERE users_id = :users_id)');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
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

    public function likesCnt($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT count(*) FROM likes WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function comments($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT count(*) FROM comments JOIN users ON comments.users_id = users.id WHERE articles_id = :articles_id'); // comments.users_id = users.id ( comments의 users_id와 users.id는 같다 )
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}