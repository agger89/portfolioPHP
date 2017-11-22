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
    // register 함수에서 받아온 변수의 $_POST(외부데이터)를 필터링
    // filter_input = 하나의 입력변수를 가져와서 필터링
    if(empty($_POST['email'])){
        $_SESSION['errorMessage'] = "이메일을 입력하지 않았습니다.";
        header('Location: views/insta.php'); // 이 페이지로 리다이렉션
        exit; // 종료
    } else{
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // 메일 형식 필터링
    }
//    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);


    // 회원가입 조건
    // $email
//    if (empty($email)) {
//        $_SESSION['errorMessage'] = "이메일을 입력하지 않았습니다.";
//        header('Location: views/insta.php'); // 이 페이지로 리다이렉션
//        exit; // 종료
//    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { // filter_var = 지정된된 변수를 가져와서 필터링(이메일 형식)
//        $_SESSION['errorMessage'] = "이메일 형식에 맞지 않습니다.";
//        header('Location: views/insta.php');
//        exit;
//    }

    if(!filter_var($email, FILTER_DEFAULT)) { // filter_var = 지정된된 변수를 가져와서 필터링
        $_SESSION['errorMessage'] = "이메일 형식에 맞지 않습니다.";
        header('Location: views/insta.php');
        exit;
    }

    // $name
    if (empty($name)) {
        $_SESSION['errorMessage'] = "이름을 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit;
    } else if (mb_strlen($name) >= 2 && mb_strlen($name) <= 4) { // mb_strlen() = 한글이던 영문이던 한글자당 1개로 계산하여 출력
        $text = 0;
        $text++;
    } else {
        $_SESSION['errorMessage'] = "이름은 2~4자만 허용됩니다.";
        header('Location: views/insta.php');
        exit;
    }

    // $nickname
    if (empty($nickname)) {
        $_SESSION['errorMessage'] = "닉네임을 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit;
    } else if (mb_strlen($nickname) >= 2 && mb_strlen($nickname <= 10)){
        $nickname = 0;
        $nickname++;
    } else {
        $_SESSION['errorMessage'] = '닉네임은 2~10자만 허용됩니다.';
        header('Location: views/insta.php');
        exit;
    }

    // $password
    if (empty($password)) {
        $_SESSION['errorMessage'] = "비밀번호를 입력하지 않았습니다.";
        header('Location: views/insta.php');
        exit;
    } else if (mb_strlen($password) >= 8 && mb_strlen($password) <= 12) {
        $pwd = 0;
        $pwd++;
    } else {
        $_SESSION['errorMessage'] = "비밀번호는 8~12자만 허용됩니다.";
        header('Location: views/insta.php');
        exit;
    }

    $user->register($email, $name, $nickname, $password);
?>