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

$followTops = $user->userFollowTop();

include 'views/header.php';
include 'views/user_list.php';
include 'views/footer.php';