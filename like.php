<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$like = new \App\Like($database->getConnect());

$likeUsers_id = $_POST['users_id'];
$articles_id = $_POST['target_id'];
$target_user_id = $_POST['target_user_id'];
$target_pic_url = $_POST['target_pic_url'];

$date = \Carbon\Carbon::now();
$like->like($likeUsers_id, $articles_id);
$like->notification([
    'users_id' => $likeUsers_id,
    'action' => 'like',
    'target_type' => 'article',
    'target_id' => $articles_id,
    'target_user_id' => $target_user_id,
    'date' => $date,
    'target_pic_url' => $target_pic_url,
    'target_content' => 'like'
]);

$return = $_POST;
$return["json"] = json_encode($return);