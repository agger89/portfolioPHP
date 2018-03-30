<?php
namespace App;

class Write
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

    public function articlesReg($users_id, $date)
    {
        $stmt = $this->connect->prepare("INSERT INTO articles(users_id, date) VALUES(:users_id, :date)");
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(":date", $date, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function picReg($url, $articles_id)
    {
        $stmt = $this->connect->prepare("INSERT INTO pics(url, articles_id) VALUES(:url, :articles_id)");
        $stmt->bindParam(":url", $url, \PDO::PARAM_STR);
        $stmt->bindParam(":articles_id", $articles_id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function commentReg($content, $users_id, $articles_id, $date)
    {

        $stmt = $this->connect->prepare("INSERT INTO comments(content, users_id, articles_id, date) VALUES(:content, :users_id, :articles_id, :date)");
        $stmt->bindParam(":content", $content, \PDO::PARAM_STR);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(":articles_id", $articles_id, \PDO::PARAM_INT);
        $stmt->bindParam(":date", $date, \PDO::PARAM_INT);
        $stmt->execute();
    }

}