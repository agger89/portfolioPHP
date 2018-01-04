<?php
require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$connect = $database->getConnect();

$faker = Faker\Factory::create();
$main = new \App\Main($database->getConnect());

$maxRandomUsers = $main->maxRandomUsers();

//지우는 데이터 위치
$connect->query("DELETE FROM articles");

for ($i=0; $i < 100; $i++) {
    $lastUserId = $maxRandomUsers['MAX(id)'];
    $userId = rand(1, $lastUserId);

    $connect->query("INSERT INTO articles (users_id) VALUES ('{$userId}')");
}

// 위에서 for문으로 articles을 생성후 그 생성된 아티클을 불러온다 ( 생성된 아티클 index 번호에 댓글을 생성하기 위해 )
$maxRandomArticles = $main->maxRandomArticle();

for ($j=0; $j < 1000; $j++) {
    $lastUserId = $maxRandomUsers['MAX(id)'];
    $userId = rand(1, $lastUserId);

    $lastArticleId = $maxRandomArticles['MAX(id)'];
    $articleId = rand(1, $lastArticleId);

    $connect->query("INSERT INTO comments (content, users_id, articles_id) VALUES ('{$faker->sentence(6)}', '{$userId}', '{$articleId}')");
}