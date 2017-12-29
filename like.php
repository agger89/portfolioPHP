<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$like = new \App\Like($database->getConnect());

$likeUsers_id = $_POST['likeUser'];
$articles_id = $_POST['articleId'];

$like->like($likeUsers_id, $articles_id);

header("Location: main.php");
