<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$follow_list = new \App\Follow_List($database->getConnect());

$users_id = $_GET['id'];
$list = $follow_list->follower($users_id);

include 'views/header.php';
include 'views/follower_list.php';
