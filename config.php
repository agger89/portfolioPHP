<?php
require './vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$host = getenv ('HOST');
$dbname = getenv ('DBNAME');
$user = getenv ('DBUSER');
$pass = getenv ('DBPASS');