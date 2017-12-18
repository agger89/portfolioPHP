<?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        header('Location: login.php');
        exit;
    }

    require 'models/Database.php';
    require 'models/Profile.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $profile = new Profile($database->getConnect());

    $nickname = $_GET['nickname'];
    $authors = $profile->authors($nickname);
    $articles = $profile->articles($nickname);
    $list = $profile->follower($nickname);

    $follow_nickname = $_GET['nickname'];
    $nickname = $_SESSION['nickname'];
    $loginFollowlist = $profile->followerLogin($nickname, $follow_nickname);


    include 'views/header.php';
    include 'views/profile.php';
    include 'views/footer.php';
?>