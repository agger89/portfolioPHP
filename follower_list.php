<?php
    session_start();
    require 'models/Database.php';
    require 'models/Follow_List.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow_list = new Follow_List($database->getConnect());

    $users_id = $_GET['id'];
    $list = $follow_list->follower($users_id);

    include 'views/header.php';
    include 'views/follower_list.php';
?>