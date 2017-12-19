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

    $members = $profile->member();

    $id = $_GET['id'];
    $authors = $profile->authors($id);
    $articles = $profile->articles($id);

    $users_id = $_GET['id'];
    $list = $profile->follower($users_id);

    $users_id = $_SESSION['id'];
    $follow_id = $_GET['id'];
    $loginFollowlist = $profile->followerLogin($users_id, $follow_id);

    include 'views/header.php';
    include 'views/profile.php';
    include 'views/footer.php';
?>