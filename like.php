<?php
    session_start();
    require 'models/Database.php';
    require 'models/Like.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $like = new Like($database->getConnect());

    $users_id = $_POST['likeUser'];
    $articles_id = $_POST['articleId'];

    $like->like($users_id, $articles_id);
    header("Location: main.php");
?>