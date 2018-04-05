<?php
namespace App;

class Main // Main 클래스안에 밑에 있는 메소드(함수)들을 소속시킨다
{
    // 프로퍼티(멤버 변수)
    protected $connect; // 외부에서 접근할 수 없고, 해당 객체를 사용하는 클래스의 어디서나 접근할 수 있다.

    // __construct : 클래스의 인스턴스 생성할때 해당 인스턴스가 가진 멤버변수(인자)를
    // 원하는 값으로 초기화하거나 또는 인스턴스가 생성될때 반드시 거쳐야하는 초기화
    // 과정 구현위해 실행하는 역할
    public function __construct($connect)// Main 클래스의 값을 매개변수(인자)로 전달 ($connect = $database->connect)
    {
        $this->connect = $connect; // $this 에 connect이라는 변수를 만들어서 $connect 매개변수(인자)의 값을 받는다 ($this->variable은 약속언어)
    }

    public function follower($users_id)
    {
        $stmt = $this->connect->prepare('SELECT follow_id FROM follow WHERE users_id IN (users_id = :users_id)');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC); // $stmt 변수에 값을 열 이름으로 인덱스된 배열로 반환
    }

    public function articles($users_id, $last_id)// article 메소드(함수)를 생성
    {
        $stmt = $this->connect->prepare("SELECT * FROM articles WHERE users_id IN (SELECT follow_id FROM follow WHERE users_id = :users_id) OR users_id = :users_id ORDER BY id DESC");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(':last_id', $last_id, \PDO::PARAM_INT);
        $stmt->execute(); // 위에서 반환한 쿼리를 서버로 전송
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); // $stmt 변수에 값을 열 이름으로 인덱스된 배열로 반환
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

    public function addComment($content, $users_id, $articles_id, $date)
    {
        $stmt = $this->connect->prepare("INSERT INTO comments(content, users_id, articles_id, date) VALUES(:content, :users_id, :articles_id, :date)");
        $stmt->bindParam(":content", $content, \PDO::PARAM_STR);
        $stmt->bindParam(":users_id", $users_id, \PDO::PARAM_INT);
        $stmt->bindParam(":articles_id", $articles_id, \PDO::PARAM_INT);
        $stmt->bindParam(":date", $date, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function notification($data)
    {
        $stmt = $this->connect->prepare("INSERT INTO notification(users_id, action, target_type, target_id, target_user_id, date, target_pic_url, target_content) VALUES(:users_id, :action, :target_type, :target_id, :target_user_id, :date, :target_pic_url, :target_content)");
        $stmt->bindParam(":users_id", $data['users_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":action", $data['action'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_type", $data['target_type'], \PDO::PARAM_STR);
        $stmt->bindParam(":target_id", $data['target_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":target_user_id", $data['target_user_id'], \PDO::PARAM_INT);
        $stmt->bindParam(":date", $data['date'], \PDO::PARAM_INT);
        $stmt->bindParam(":target_pic_url", $data['target_pic_url'], \PDO::PARAM_INT);
        $stmt->bindParam(":target_content", $data['target_content'], \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function maxRandomUsers()
    {
        $stmt = $this->connect->prepare('SELECT MAX(id) FROM users');
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function maxRandomArticle()
    {
        $stmt = $this->connect->prepare('SELECT MAX(id) FROM articles');
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function countArticle($users_id)
    {
        $stmt = $this->connect->prepare('SELECT COUNT(*) FROM articles WHERE users_id IN (SELECT follow_id FROM follow WHERE users_id = :users_id) OR users_id = :users_id');
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function followerStatus($users_id)
    {
        $stmt = $this->connect->prepare("SELECT notification.action,target_type,target_id,target_user_id,date,target_pic_url,target_content, users.id,nickname,profile_pic FROM notification JOIN users ON notification.users_id = users.id ORDER BY notification.id DESC");
        $stmt->bindParam(':users_id', $users_id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}