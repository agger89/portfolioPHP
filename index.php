<?php
    require('Session.php');

    if(isset($_SESSION['is_login'])){ // is_login 세션 변수가 있으면 main.php로 이동
        header('Location: main.php');
        exit;
    }

    include 'views/header.php';
    include 'views/index.php';
    include 'views/footer.php';
?>