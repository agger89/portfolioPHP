<?php
namespace App;

class User
{

    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function getConnect()
    {
        return $this->connect;
    }

    public function register()
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $nickname = $_POST['nickname'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 원본 패스워드를 암호화된 패스워드로 변환

        $stmt = $this->connect->prepare("INSERT INTO users (email, name, nickname, password) VALUES('$email', '$name', '$nickname', '$password')");
        $stmt->execute();

        return $this->connect->lastInsertId(); // 아이디값을 리턴
    }

    public function emailDubChk($email)
    {
        $stmt = $this->connect->prepare('SELECT email FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function nicknameDubChk($nickname)
    {
        $stmt = $this->connect->prepare('SELECT nickname FROM users WHERE nickname = :nickname');
        $stmt->bindParam(':nickname', $nickname, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function loginChk($email)
    {
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function profilePic($profile_pic)
    {
        $stmt = $this->connect->prepare("INSERT INTO users(profile_pic) VALUES(:profile_pic)");
        $stmt->bindParam(":profile_pic", $profile_pic, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function followerLogin($users_id, $follow_id)
    {
        $stmt = $this->connect->prepare('SELECT users.name, follow.follow_id FROM users JOIN follow ON users.id = follow.users_id WHERE users_id = :users_id AND follow_id = :follow_id');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(':follow_id', $follow_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function userFollowTop($users_id)
    {
        $stmt = $this->connect->prepare('SELECT users.id,name,nickname,profile_pic, follow.users_id, COUNT(users_id) AS coun FROM users JOIN follow ON follow.users_id = users.id WHERE users_id NOT IN (SELECT follow_id FROM follow WHERE users_id = :users_id UNION SELECT id FROM users WHERE id = :users_id) GROUP BY users_id ORDER BY coun DESC LIMIT 3');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function userNotFollower($users_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE id NOT IN (SELECT follow_id FROM follow WHERE users_id = :users_id UNION SELECT id FROM users WHERE id = :users_id)');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function notFollowerArticles($users_id)
    {
        $stmt = $this->connect->prepare("SELECT * FROM articles WHERE users_id NOT IN (SELECT follow_id FROM follow WHERE users_id = :users_id UNION SELECT id FROM users WHERE id = :users_id)");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
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

    public function likesCnt($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT count(*) FROM likes WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function comments($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT count(*) FROM comments JOIN users ON comments.users_id = users.id WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $stmt = $this->connect->prepare('UPDATE users SET profile_pic = :profile_pic WHERE id = :id');
        $stmt->bindParam(':profile_pic', $data['profile_pic'], \PDO::PARAM_STR);
        $stmt->bindParam(':id', $data['id'], \PDO::PARAM_INT);
        $stmt->execute();
    }
}