<?php
session_start();

require 'config.php';
require __DIR__. '/vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$write_delete = new \App\Write_Delete($database->getConnect());

// 댓글은 cascade 액션으로 글이 지워 지면 같이 지워지게 변경 해놓음

$pics_id = $_POST["picsId"];
$articles_id = $_POST["articleId"];

$write_delete->deletePic($pics_id);
$write_delete->deleteArticle($articles_id);


header('Location: main.php');
