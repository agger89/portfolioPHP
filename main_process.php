<?php
require 'Session.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';
require __DIR__. '/vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$main = new \App\Main($database->getConnect()); // $main 변수 안에 Main 클래스 생성해서 담고 Main 클래스안에 Database 클래스가 연결한 DB를 담는다

$users_id = $_SESSION['id'];
$follow = $main->follower($users_id);

$follow_ids = [$users_id];
foreach ($follow as $item) {
    $follow_ids[] = $item['follow_id'];
}

$in = implode(",", $follow_ids); // 배열로 되어있는 $follow_ids의 값을 ,문자로 결합
$users_id = $in;

$last_id = isset($_GET['last_id']) ? $_GET['last_id'] : '';
$articles = $main->articles($users_id, $last_id);
for($i=0; $i < count($articles); $i++) { // $articles 변수에 담겨있는 articles 메소드의 값을 세어서 출력

    $articles[$i]['authors'] = $main->authors($articles[$i]['users_id']);
    // $articles 변수에 users 라는 배열을 담는다 = users 메소드에 $articles의 users_id 배열을 담는다

    $articles[$i]['pics'] = $main->pics($articles[$i]['id']);

    $articles[$i]['comments'] = $main->comments($articles[$i]['id']);

    $articles[$i]['likes'] = $main->likes($articles[$i]['id'], $_SESSION['id']);

    $articles[$i]['likesCnt'] = $main->likesCnt($articles[$i]['id']);
}

$follow_status = $main->followerStatus($users_id);