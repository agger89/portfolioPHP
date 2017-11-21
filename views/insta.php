<?php
    session_start();
    // isset = 변수에 값이 존재하는지 존재하면 true 리턴
    // 삼항연산자 (조건문)? true : false
    $errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : '';
    unset($_SESSION['errorMessage']); // 변수 지우기
?>
<!DOCTYPE html>
<html>
<head>
    <!-- 메타 태그 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Instagram</title>
    <meta name="title" content="인스타그램">
    <!-- css -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/helper.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/default_small.css" media="all and (min-width: 450px)">
    <link rel="stylesheet" href="../css/default_medium.css" media="all and (min-width: 876px)">
    <!-- lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- js -->
    <script src="../js/index.js"></script>
</head>
<body>
    <?php include("index.php") ?>
<!--    --><?php //include("main.php") ?>
</body>
</html>