<?php
namespace App;

class Database
{
    // 프로퍼티(멤버 변수)
    private $connect; // 외부에서 접근할 수 없고. 해당 객체를 사용하는 어디서나 접근할 수 있다.
    public $error;

    public function __construct($host, $dbname, $user, $pass)
    {
        // 성능이 중요할 경우엔 try catch 로 예외처리 하지 않는다 (용량 커지고 느려진다)
        try{ // 예외의 발생이 예상되는
            $this->connect = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass); // 데이터베이스 연결
        } catch (\PDOException $e) { // 예외가 발생했을 때 실행되는
            $this->error = ($e->getMessage()); // getMessage = 오류의 원인을 리턴
        }
    }

    public function getConnect(): \PDO
    {
        return $this->connect;
    }
}