<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$user = new \App\User($database->getConnect());

// 프로필 사진 업로드
$target_dir = './uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$profile_pic = $target_file;

$users_id = $_SESSION['id'];

if(!isset($_SESSION['errorMessage'])){
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $profile_pic)){
        $user->update([
            'id' => $users_id,
            'profile_pic' => $profile_pic
        ]);
    }
}

header("Location: profile.php?id=$users_id");