<?php
    include 'models/Main.php';

    $db_data = new PDO('mysql:host=localhost;dbname=mydb', 'root', '111111');
    $main = new Main($db_data);

    $articles = $main->articles();

    for($i=0; $i < count($articles); $i++) {
        // 이 아티클을 작성한 유저의 정보를 가져온다
        // 이 아티클 배열에 유저 정보를 추가힌다
        $articles[$i]['users'] = $main->users($articles[$i]['users_id']);

        $articles[$i]['pics'] = $main->pics($articles[$i]['users_id']);

        $articles[$i]['comments'] = $main->comments($articles[$i]['id']);

        $articles[$i]['likes'] = $main->likes($articles[$i]['id']);

    }

?>