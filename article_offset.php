<?php
require 'Session.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$main = new \App\ArticleOffset($database->getConnect());

$users_id = $_SESSION['id'];
$follow = $main->follower($users_id);

$follow_ids = [$users_id];
foreach ($follow as $item) {
    $follow_ids[] = $item['follow_id'];
}

$in = implode(",", $follow_ids);
$users_id = $in;

$last_id = isset($_GET['last_id']) ? $_GET['last_id'] : "";

$articlesOffset = $main->articlesOffset($users_id, $last_id);
for($i=0; $i < count($articlesOffset); $i++) {

    $articlesOffset[$i]['authors'] = $main->authors($articlesOffset[$i]['users_id']);

    $articlesOffset[$i]['pics'] = $main->pics($articlesOffset[$i]['id']);

    $articlesOffset[$i]['comments'] = $main->comments($articlesOffset[$i]['id']);

    $articlesOffset[$i]['likes'] = $main->likes($articlesOffset[$i]['id'], $_SESSION['id']);

    $articlesOffset[$i]['likesCnt'] = $main->likesCnt($articlesOffset[$i]['id']);
}
var_dump($articlesOffset);

$json = include('main_articles.php');

echo json_encode($json);
