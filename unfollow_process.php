<?php
    session_start();
    require 'models/Database.php';
    require 'models/UnFollow.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow = new UnFollow($database->getConnect());

    $follow_nickname = $_POST['unfollowNic'];
    $users_id = $_POST['unfollower'];
    $follow->unfollowReg($follow_nickname, $users_id);

    header("Location: profile.php?nickname=$follow_nickname");
?>