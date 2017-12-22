<?php
    session_start();
    require 'models/Database.php';
    require 'models/Unlike.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $unlike = new Unlike($database->getConnect());

    $users_id = $_POST['unlikeUser'];
    $articles_id = $_POST['articleId'];

    $unlike->unlike($users_id, $articles_id);
    header("Location: main.php");
?>