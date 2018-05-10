<?php
session_start();

require 'config.php';
require __DIR__. '/vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$comment_delete = new \App\Main($database->getConnect());

$content = $_POST['content'];
$users_id = $_SESSION['id'];
$articles_id = $_POST['articleId'];
$date = $_POST['date'];

$comment_delete->deleteComment($content,$users_id,$articles_id,$date);
