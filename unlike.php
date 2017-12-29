<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$unlike = new \App\Unlike($database->getConnect());

$unlikeUsers_id = $_POST['unlikeUser'];
$articles_id = $_POST['articleId'];

$unlike->unlike($unlikeUsers_id, $articles_id);
header("Location: main.php");
