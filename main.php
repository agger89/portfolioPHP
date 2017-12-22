<?php
    require 'Session.php';

    if (!isset($_SESSION['is_login'])) {
        header('Location: login.php');
        exit;
    }

    require 'models/Database.php';
    require 'models/Main.php'; //데이터베이스에 연결 또는 코드의 실행에 있어서 필요한 로직을 점검해야할때는 require
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $main = new Main($database->getConnect()); // $main 변수 안에 Main 클래스 생성해서 담고 Main 클래스안에 Database 클래스가 연결한 DB를 담는다

    $users_id = $_SESSION['id'];
    $follow = $main->follower($users_id);

    $follow_ids = [$users_id];
    foreach ($follow as $item) {
        $follow_ids[] = $item['follow_id'];
    }
    $in = implode(",", $follow_ids); // 배열로 되어있는 $follow_ids의 값을 ,문자로 결합
    $users_id = $in;

    $articles = $main->articles($users_id); // $articles 변수에 main 클래스에 소속된 articles 메소드를 담음
    for($i=0; $i < count($articles); $i++) { // $articles 변수에 담겨있는 articles 메소드의 값을 세어서 출력

        $articles[$i]['authors'] = $main->authors($articles[$i]['users_id']);
        // $articles 변수에 users 라는 배열을 담는다 = users 메소드에 $articles의 users_id 배열을 담는다

        $articles[$i]['pics'] = $main->pics($articles[$i]['id']);

        $articles[$i]['comments'] = $main->comments($articles[$i]['id']);

        $articles[$i]['likes'] = $main->likes($articles[$i]['id'], $_SESSION['id']);

        $articles[$i]['likesCnt'] = $main->likesCnt($articles[$i]['id']);
    }



include 'views/header.php';
    include 'views/main.php';
?>