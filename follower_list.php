<?php
    session_start();
    require 'models/Database.php';
    require 'models/Follow_List.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow_list = new Follow_List($database->getConnect());

    $nickname = $_GET['nickname'];
    $list = $follow_list->follower($nickname);

    include 'views/header.php';
    include 'views/follower_list.php';
?>