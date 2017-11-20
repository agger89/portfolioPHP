<?php
    session_start();
    require 'models/User.php'; //데이터베이스에 연결 또는 코드의 실행에 있어서 필요한 로직을 점검해야할때는 require

    // 성능이 중요할 경우엔 try catch 로 예외처리 하지 않는다 (용량 커지고 느려진다)
    try{ // 예외의 발생이 예상되는
        $db_data = new PDO('mysql:host=localhost;dbname=insta_db', 'root', '111111'); // 데이터베이스 연결
    } catch (PDOException $e) { // 예외가 발생했을 때 실행되는
        die($e->getMessage()); // getMessage = 오류의 원인을 리턴
    }

    $user = new User($db_data);

    // 필터링
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT); // $email 변수를 필터링 INPUT_POST = 합법적 이메일 주소인지
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

    // 회원가입 조건

    // $email
    if (empty($email)) {
        $_SESSION['errorMessage'] = "이메일을 입력하지 않았습니다.";
        header('Location: views/insta.php'); // 이 페이지로 리다이렉션
        exit; // 종료
    }

    // $name
    if (empty($name)) {
        $_SESSION['errorMessage'] = "성명을 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit; // 종료
    }

    // $nickname
    if (empty($nickname)) {
        $_SESSION['errorMessage'] = "사용자 이름을 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit; // 종료
    }

    // $nickname
    if (empty($password)) {
        $_SESSION['errorMessage'] = "비밀번호를 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit; // 종료
    }

    $user->register();
?>