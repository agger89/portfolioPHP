<?php
    session_start();
    require 'models/Database.php';
    require 'models/Main.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $main = new Main($database->getConnect());

    $comment = filter_input(INPUT_POST, 'comment', FILTER_DEFAULT);


    $main->addComment($comment, $_SESSION['id'], $_POST['articleId']);

    header('Location: main.php');
?>