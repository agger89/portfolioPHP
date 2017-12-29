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

    public function articlesReg()
    {
        $users_id = $_SESSION['id'];
        $stmt = $this->connect->prepare("INSERT INTO articles(users_id) VALUES('$users_id')");
        $stmt->execute();
    }

//        public function articleId($users_id)
//        {
//            $stmt = $this->connect->prepare("SELECT id FROM articles WHERE users_id = :users_id ORDER BY id DESC"); // ORDER BY id DESC = 오름차순으로 데이터 정렬
//            $stmt->bindParam(":users_id", $users_id);
//            $stmt->execute();
//            return $stmt->fetch(PDO::FETCH_ASSOC); // fetch() = 데이터의 행에 위에 값부터 가져가서 배열로 뿌려준다
//        }

    public function picReg($articles_id, $url)
    {
        $stmt = $this->connect->prepare("INSERT INTO pics(articles_id, url) VALUES(:articles_id, :url)");
        $stmt->bindParam(":articles_id", $articles_id, \PDO::PARAM_INT);
        $stmt->bindParam(":url", $url, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function commentReg($content, $users_id, $articles_id)
    {
        $stmt = $this->connect->prepare("INSERT INTO comments(content, users_id, articles_id) VALUES(:content, :users_id, :articles_id)");
        $stmt->bindParam(":content", $content, \PDO::PARAM_STR);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(":articles_id", $articles_id, \PDO::PARAM_INT);
        $stmt->execute();
    }

}