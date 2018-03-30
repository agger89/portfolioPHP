<?php
session_start();

require 'config.php';
require __DIR__. './vendor/autoload.php';

$database = new \App\Database($host, $dbname, $user, $pass);
$write = new \App\Write($database->getConnect());

//필터링
$comment = filter_input(INPUT_POST, 'comment', FILTER_DEFAULT);
$users_id = $_SESSION['id'];

$target_dir = './uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // 파일의 확장자를 문자열로 출력한다.


$date = \Carbon\Carbon::now();

function redirect()
{
    header('Location: write.php'); // 이 페이지로 리다이렉션
    exit; // 종료
}

// 이미지 등록 여부 체크
if(isset($_POST['submit'])){
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']); // 이미지의 크기, 형식을 알려준다
    if($check == false){
        $_SESSION['errorMessage'] = "이미지를 등록해주세요";
        redirect();
    }
}

// 이미지 사이즈 체크
if($_FILES["fileToUpload"]['size'] > 500000){
    $_SESSION['errorMessage'] = "파일용량은 500KB를 초과할 수 없습니다,";
    redirect();
}

// 이미지 허용 포맷 체크
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
    $_SESSION['errorMessage'] = "이미지는 JPG, JPEG, PNG, GIF만 허용합니다.";
    redirect();
}

if(!isset($_SESSION['errorMessage'])){
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){ //move_uploaded_file = 서버로 전송된 파일 저장
        $write->articlesReg($users_id, $date);
        $write->picReg($target_file, $write->getConnect()->lastInsertId()); //lastInsertId() = 데이터에 삽입된 마지막 행의 아이디를 리턴
    }
}

if($comment) {
    $write->commentReg($comment, $users_id, $write->getConnect()->lastInsertId(), $date);
}

header('Location: main.php');
