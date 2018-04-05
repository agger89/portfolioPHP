<?php
namespace App;

class articleOffset
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function follower($users_id)
    {
        $stmt = $this->connect->prepare('SELECT follow_id FROM follow WHERE users_id IN (users_id = :users_id)');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC); // $stmt 변수에 값을 열 이름으로 인덱스된 배열로 반환
    }

    public function articlesOffset($users_id, $last_id)
    {
        var_dump($last_id);
//        $stmt = $this->connect->prepare("SELECT * FROM articles WHERE users_id IN (SELECT follow_id FROM follow WHERE users_id = :users_id) OR users_id = :users_id AND id < :last_id ORDER BY id DESC LIMIT 5");
        $stmt = $this->connect->prepare("SELECT * FROM articles WHERE users_id IN (SELECT follow_id FROM follow WHERE users_id = :users_id) OR users_id = :users_id AND id < :last_id ORDER BY id DESC LIMIT 5");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(':last_id', $last_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function authors($id) // authors 메소드(함수)에 매개변수(인자)를 삽입
    {
        $stmt = $this->connect->prepare('SELECT id, name, nickname, profile_pic FROM users WHERE id = :id'); // $stmt 변수에 DB users테이블에 id 쿼리를 반환
        // PDO::PARAM_INT(sql 정수 유형을 호출)
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);  // 위에서 반환한 id의 값를 매개 변수(인자)로 만듬 binding(묶음) (고정이 아닌 유동적으로 개수만큼 출력하기 위하여)
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function pics($id)
    {
        $stmt = $this->connect->prepare('SELECT id, url FROM pics WHERE id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function likes($articles_id, $users_id)
    {
        $stmt = $this->connect->prepare('SELECT users_id FROM likes WHERE articles_id = :articles_id AND users_id = :users_id');
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function likesCnt($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT * FROM likes WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function comments($articles_id)
    {
        $stmt = $this->connect->prepare('SELECT comments.content,date, users.id,nickname FROM comments JOIN users ON comments.users_id = users.id WHERE articles_id = :articles_id'); // comments.users_id = users.id ( comments의 users_id와 users.id는 같다 )
        $stmt->bindParam(':articles_id', $articles_id, \PDO::PARAM_INT);
        $stmt->execute();

        $rows = array(); //$rows 라는 변수를 배열로 만들겠다
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){ // $stmt 변수의 값을(댓글) 열 이름으로 인덱스된 배열로 반환한다 while문 동안
            $rows[] = $row; // $rows 변수와 $row 변수는 같다
        }
        return $rows; // $ rows 변수 출력
    }
}