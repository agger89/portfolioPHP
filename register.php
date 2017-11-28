<?php
    session_start();
    require 'Database.php';
    require 'models/User.php'; //데이터베이스에 연결 또는 코드의 실행에 있어서 필요한 로직을 점검해야할때는 require
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $user = new User($database->getConnect());

    // 필터링
    // register 함수에서 받아온 변수의 $_POST(외부데이터)를 필터링
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // filter_input = 하나의 입력변수를 가져와서 필터링(메일 형식)
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

    $countForm = 0;


    // 입력 폼 데이터 저장
    if(isset($_POST['submitBtn'])) :
        $_SESSION['email'] =  $_POST['email'];
        $_SESSION['name'] =  $_POST['name'];
        $_SESSION['nickname'] =  $_POST['nickname'];
    endif;

    $formArray = array('submitBtn'=>array('email'=>$_SESSION['email'], 'name'=>$_SESSION['name'], 'nickname'=>$_SESSION['nickname']));
    $_SESSION['formSession'] = $formArray;

    function redirect(){
        header('Location: views/insta.php'); // 이 페이지로 리다이렉션
        exit; // 종료
    }

    // 회원가입 조건
    // $email
    if(empty($_POST['email'])) {
        $_SESSION['errorMessage'] = "이메일을 입력하지 않았습니다.";
        redirect();
    }
    if(!$email) {
        $_SESSION['errorMessage'] = "이메일 형식에 맞지 않습니다.";
        redirect();
    }


    // $name
    if (empty($name)) {
        $_SESSION['errorMessage'] = "이름을 입력하지 않았습니다.";
        redirect();
    }
    if (mb_strlen($name) >= 2 && mb_strlen($name) <= 4) { // mb_strlen() = 한글이던 영문이던 한글자당 1개로 계산하여 출력
        $countForm++;
    } else {
        $_SESSION['errorMessage'] = "이름은 2~4자만 허용됩니다.";
        redirect();
    }

    // $nickname
    if (empty($nickname)) {
        $_SESSION['errorMessage'] = "닉네임을 입력하지 않았습니다.";
        redirect();
    }
    if (mb_strlen($nickname) >= 2 && mb_strlen($nickname <= 10)){
        $countForm++;
    } else {
        $_SESSION['errorMessage'] = '닉네임은 2~10자만 허용됩니다.';
        redirect();
    }

    // $password
    if (empty($password)) {
        $_SESSION['errorMessage'] = "비밀번호를 입력하지 않았습니다.";
        redirect();
    }
    if (mb_strlen($password) >= 8 && mb_strlen($password) <= 12) {
        $countForm++;
    } else {
        $_SESSION['errorMessage'] = "비밀번호는 8~12자만 허용됩니다.";
        redirect();
    }

    $user->register($email, $name, $nickname, $password);
?>