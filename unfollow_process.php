<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$follow = new \App\UnFollow($database->getConnect());

$authors_id = $_POST['unfollowId'];
$unfollower_id = $_POST['unfollower'];

$follow->unfollowReg($authors_id, $unfollower_id);

header("Location: profile.php?id=$authors_id");
