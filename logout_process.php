<?php
    session_start();
    session_destroy(); // 세션에 등록된 모든 데이터 파괴
    header('Location: login.php');
