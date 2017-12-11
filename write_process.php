+<?php
    session_start();
    require 'Database.php';
    require 'models/Write.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $write = new Write($database->getConnect());

    $target_dir = './uploads/';
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // 파일의 확장자를 문자열로 출력한다.

    function redirect(){
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
        $_SESSION['errorMessage'] = "파일용량은 5KB를 초과할 수 없습니다,";
        redirect();
    }

    // 이미지 허용 포맷 체크
    if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif'){
        $_SESSION['errorMessage'] = "이미지는 JPG, JPEG, PNG, GIF만 허용합니다.";
        redirect();
    }

    if(!isset($_SESSION['errorMessage'])){ //세션 에러메세지가 없으면
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
            $write->articles();
            $articles_id = $write->usersId($_SESSION['id']);
            $write->uploadPic($articles_id['id'], $target_file);
            header('Location: main.php');
        }
    }

?>