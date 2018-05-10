<?php
session_start();

require 'config.php';
require __DIR__. '/vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$user = new \App\User($database->getConnect());

// 프로필 사진 업로드
$target_dir = './uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$profile_pic = $target_file;

$users_id = $_SESSION['id'];

// 서버 문자 알아내는
//echo "==>".var_dump(iconv_get_encoding('all'))."<br>";

function redirect()
{
    header('Location: profile.php?id='.$_SESSION["id"].'&page=1'); // 이 페이지로 리다이렉션
    exit; // 종료
}

// 파일명 한글 체크
if(preg_match("/[\xA1-\xFE][\xA1-\xFE]/", $profile_pic)) {
    $_SESSION['errorMessage'] = "파일명이 한글이면 업로드 할 수 없습니다.";
    redirect();
}


if(!isset($_SESSION['errorMessage'])){
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $profile_pic)){
        $user->update([
            'id' => $users_id,
            'profile_pic' => $profile_pic
        ]);
    }
}

header("Location: profile.php?id=$users_id");