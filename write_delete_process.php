<?php
    session_start();
    require 'models/Database.php';
    require 'models/Write_Delete.php';
    require 'config.php';

    $database = new Database($host, $dbname, $user, $pass);
    $write_delete = new Write_Delete($database->getConnect());

    // 댓글은 cascade 액션으로 글이 지워 지면 같이 지워지게 변경 해놓음

    $write_delete->deletePic($_POST["picsId"]);
    $write_delete->deleteArticle($_POST["articleId"]);


    header('Location: main.php');
?>