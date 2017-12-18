<?php
    session_start();
    require 'models/Database.php';
    require 'models/Follow.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow = new Follow($database->getConnect());

    $follow->followReg($_POST['follow_nickname'], $_POST['users_id'], $_POST['follow_name']);

    $nickname = $_POST['follow_nickname'];
    header("Location: profile.php?nickname=$nickname");
?>