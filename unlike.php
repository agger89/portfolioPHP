<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$unlike = new \App\Unlike($database->getConnect());

$unlikeUsers_id = $_POST['users_id'];
$articles_id = $_POST['target_id'];

$unlike->unlike($unlikeUsers_id, $articles_id);
$unlike->notification($unlikeUsers_id, $articles_id);

$return = $_POST;
$return["json"] = json_encode($return);