<?php
    include 'models/Main.php';

    $db_data = new PDO('mysql:host=localhost;dbname=mydb', 'root', '111111'); // 데이터베이스 연결
    $main = new Main($db_data); // $main 변수 안에 Main 클래스 생성해서 담고 Main 클래스안에 $db_data 변수의 값을 담는다

    $articles = $main->articles(); // $articles 변수에 main 클래스에 소속된 articles 메소드를 담음

    for($i=0; $i < count($articles); $i++) { // $articles 변수에 담겨있는 articles 메소드의 값을 세어서 출력

        $articles[$i]['users'] = $main->users($articles[$i]['users_id']);
        // $articles 변수에 users 라는 배열을 담는다 = users 메소드에 $articles의 users_id 배열을 담는다

        $articles[$i]['pics'] = $main->pics($articles[$i]['users_id']);

        $articles[$i]['comments'] = $main->comments($articles[$i]['id']);

        $articles[$i]['likes'] = $main->likes($articles[$i]['id']);

    }

?>