<?php
    session_start();
    require 'models/Database.php';
    require 'models/Follow.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $follow = new Follow($database->getConnect());

    $follow->followReg($_POST['follow_id'], $_POST['users_id']);

    $id = $_POST['follow_id'];
    header("Location: profile.php?id=$id");
?>