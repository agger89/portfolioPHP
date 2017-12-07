<?php
    session_start();
    require 'Database.php';
    require 'models/User.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $user = new User($database->getConnect());

    //필터링
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

    // 공통 함수
    function redirect(){
        header('Location: login.php'); // 이 페이지로 리다이렉션
        exit; // 종료
    }

    // 입력 폼 데이터 저장
    if(isset($_POST['email'])) :
        $_SESSION['email'] =  $_POST['email'];
    endif;


    //로그인 검증
    // 이메일
    if(empty($_POST['email'])) {
        $_SESSION['errorMessage'] = "이메일을 입력하지 않았습니다.";
        redirect();
    }
    if(!$email) {
        $_SESSION['errorMessage'] = "이메일 형식에 맞지 않습니다.";
        redirect();
    }
    $loginChk = $user->loginChk($email);
    if($email != $loginChk['email']) {
        $_SESSION['errorMessage'] = "존재하지 않는 이메일 주소입니다.";
        redirect();
    }

    // 비밀번호
    if (empty($password)) {
        $_SESSION['errorMessage'] = "비밀번호를 입력하지 않았습니다.";
        redirect();
    }
    if(!password_verify($password, $loginChk['password'])) {
        $_SESSION['errorMessage'] = "잘못된 비밀번호 입니다.";
        redirect();
    }

    $_SESSION['is_login'] = true;
    $_SESSION['nickname'] = $loginChk['nickname']; // 로그인 조건이 만족하면 $loginChk['nickname'] 데이터를 $_SESSION에 담는다
    header('Location: main.php');
    exit;

?>