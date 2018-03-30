<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$main = new \App\Main($database->getConnect());

$users_id = $_SESSION['id'];
$articles_id = $_POST['target_id'];
$target_user_id = $_POST['target_user_id'];
$target_pic_url = $_POST['target_pic_url'];
$target_content = $_POST['target_content'];

$date = \Carbon\Carbon::now();

$main->addComment($target_content, $users_id, $articles_id, $date);

$main->notification([
    'users_id' => $users_id,
    'action' => 'comment',
    'target_type' => 'article',
    'target_id' => $articles_id,
    'target_user_id' => $target_user_id,
    'date' => $date,
    'target_pic_url' => $target_pic_url,
    'target_content' => $target_content
]);

$return = $_POST;
$return["json"] = json_encode($return);
echo json_encode($return);