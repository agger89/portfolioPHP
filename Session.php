<?php
    session_start();
    // isset = 변수에 값이 존재하는지 존재하면 true 리턴
    // 삼항연산자 (조건문)? true : false
    $errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';
    unset($_SESSION['errorMessage']); // 변수 지우기 (새로 고침시 에러 메세지 지우는)

    $formSession = isset($_SESSION['formSession']) ? $_SESSION['formSession'] : '';
    unset($_SESSION['formSession']);

    $emailSession = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    unset($_SESSION['email']);
?>