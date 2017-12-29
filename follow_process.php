<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$follow = new \App\Follow($database->getConnect());

$authors_id = $_POST['follow_id'];
$follower_id = $_POST['users_id'];

$follow->followReg($authors_id, $follower_id);

$authors_id = $_POST['follow_id'];

header("Location: profile.php?id=$authors_id");
