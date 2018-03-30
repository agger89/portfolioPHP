<?php
session_start();

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$user = new \App\User($database->getConnect());


$users_id = $_SESSION['id']; // 로그인 한 유저 아이디
$follow_id = $_GET['id']; // 로그인 한 유저가 팔로우한 유저 아이디
$followTops = $user->userFollowTop($users_id);

$notFollowerArti = $user->notFollowerArticles($users_id);

for($i=0; $i < count($notFollowerArti); $i++) {

    $notFollowerArti[$i]['pics'] = $user->pics($notFollowerArti[$i]['id']);

    $notFollowerArti[$i]['comments'] = $user->comments($notFollowerArti[$i]['id']);

    $notFollowerArti[$i]['likesCnt'] = $user->likesCnt($notFollowerArti[$i]['id']);

}

include 'views/header.php';
include 'views/user_list.php';
include 'views/footer.php';