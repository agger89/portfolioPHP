<?php
require 'Session.php';

if (!isset($_SESSION['is_login'])) {
    header('Location: login.php');
    exit;
}

include 'views/header.php';
include 'views/write.php';
include 'views/footer.php';