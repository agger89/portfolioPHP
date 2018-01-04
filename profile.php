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

$members = $profile->member();

$users_id = $_GET['id']; // url로 넘어온 파라미터값 아이디의 유저
$authors = $profile->authors($users_id);
$list = $profile->follower($users_id);

$users_id = $_SESSION['id']; // 로그인한 유저 아이디
$follow_id = $_GET['id']; // 로그인한 유저가 팔로우한 유저 아이디
$loginFollowlist = $profile->followerLogin($users_id, $follow_id);

// paging
require 'paging_process_profile.php';

$articles = $profile->articles($users_id, $limitIdx, $pageSet);
for($i=0; $i < count($articles); $i++) {
    $articles[$i]['pics'] = $profile->pics($articles[$i]['id']);
}

include 'views/header.php';
include 'views/profile.php';
include 'views/footer.php';
