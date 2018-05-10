<?php
session_start();

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

require 'config.php';
require __DIR__. '/vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$profile = new \App\Profile($database->getConnect());
$user = new \App\User($database->getConnect());

$users_id = $_SESSION['id']; // 로그인 한 유저 아이디

$not_follower = $user->userNotFollower($users_id);

include 'views/header.php';
include 'views/header_content.php';
include 'views/all_user_list.php';