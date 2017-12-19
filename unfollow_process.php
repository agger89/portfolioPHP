<?php
    session_start();
    require 'models/Database.php';
    require 'models/UnFollow.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow = new UnFollow($database->getConnect());

    $follow_id = $_POST['unfollowId'];
    $users_id = $_POST['unfollower'];
    $follow->unfollowReg($follow_id, $users_id);

    header("Location: profile.php?id=$follow_id");
?>