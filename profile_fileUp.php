<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$user = new \App\User($database->getConnect());

// 프로필 사진 업로드
$target_dir = './uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // 파일의 확장자를 문자열로 출력한다.

if(!isset($_SESSION['errorMessage'])){ //세션 에러메세지가 없으면
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){ //move_uploaded_file = 서버로 전송된 파일 저장
        $user->profilePic($target_file);
    }
}

$users_id = $_SESSION['id']; // 로그인 한 유저 아이디

header("Location: profile.php?id=$users_id");