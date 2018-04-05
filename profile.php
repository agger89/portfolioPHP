<?php
session_start();

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$profile = new \App\Profile($database->getConnect());
$user = new \App\User($database->getConnect());

$users_id = $_GET['id']; // url로 넘어온 파라미터값 아이디의 유저
$authors = $profile->authors($users_id);
$list = $profile->follower($users_id);

$users_id = $_SESSION['id']; // 로그인 한 유저 아이디
$follow_id = $_GET['id']; // 로그인 한 유저가 팔로우한 유저 아이디
$loginFollowlist = $profile->followerLogin($users_id, $follow_id);
$not_follower = $user->userNotfollower($users_id);

// paging
require 'paging_process_profile.php';

$users_id = $_GET['id']; // url로 넘어온 파라미터값 아이디의 유저

$articles = $profile->articles($users_id, $limitIdx, $pageSet);

for($i=0; $i < count($articles); $i++) { // $articles 변수에 담겨있는 articles 메소드의 값을 세어서 출력

    $articles[$i]['pics'] = $profile->pics($articles[$i]['id']);

    $sortComment = $articles[$i]['comments'] = $profile->comments($articles[$i]['id']);

    $articles[$i]['likesCnt'] = $profile->likesCnt($articles[$i]['id']);
}

include 'views/header.php';
include 'header_content.php';
include 'views/profile.php';
include 'views/footer.php';