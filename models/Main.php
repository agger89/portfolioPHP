<?php

    class Main{ // Main 클래스안에 밑에 있는 메소드(함수)들을 소속시킨다

        // __construct : 클래스의 인스턴스 생성할때 해당 인스턴스가 가진 멤버변수(인자)를
        // 원하는 값으로 초기화하거나 또는 인스턴스가 생성될때 반드시 거쳐야하는 초기화
        // 과정 구현위해 실해하는 역할
        public function __construct($mydb){ // Main 클래스의 값을 매개변수(인자)로 전달
            $this->dbname = $mydb; // $this 에 dbname이라는 변수를 만들어서 $mydb 매개변수(인자)의 값을 받는다
        }

        public function articles(){  // article 메소드(함수)를 생성
            $stmt = $this->dbname->prepare('SELECT * FROM article'); // $stmt 변수에 DB article테이블 쿼리를 반환
            $stmt->execute(); // 위에서 반환한 쿼리를 서버로 전송

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // $stmt 변수에 값을 열 이름으로 인덱스된 배열로 반환
        }

        public function authors($id){ // users 메소드(함수)에 매개변수(인자)를 삽입
            $stmt = $this->dbname->prepare('SELECT * FROM users WHERE id = :id'); // $stmt 변수에 DB users테이블에 id 쿼리를 반환
            // PDO::PARAM_INT(sql 정수 유형을 호출)
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // 위에서 반환한 id의 값를 매개 변수(인자)로 만듬 binding(묶음) (고정이 아닌 유동적으로 개수만큼 출력하기 위하여)
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function pics($id){
            $stmt = $this->dbname->prepare('SELECT * FROM pics WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function likes($article_id){
            $stmt = $this->dbname->prepare('SELECT * FROM likes WHERE article_id = :article_id');
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function comments($article_id){
            $stmt = $this->dbname->prepare('SELECT * FROM comments JOIN users ON comments.users_id = users.id WHERE article_id = :article_id');
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $stmt->execute();

            $rows = array(); //$rows 라는 변수를 배열로 만들겠다
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ // $stmt 변수의 값을 열 이름으로 인덱스된 배열로 반환한다 while문 동안
                $rows[] = $row; // $rows 변수와 $row 변수는 같다
            }
            return $rows; // $ rows 변수 출력

        }
    }

?>