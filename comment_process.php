<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$main = new \App\Main($database->getConnect());

$comment = filter_input(INPUT_POST, 'comment', FILTER_DEFAULT);
$users_id = $_SESSION['id'];
$articles_id = $_POST['articleId'];

$main->addComment($comment, $users_id, $articles_id);

header('Location: main.php');