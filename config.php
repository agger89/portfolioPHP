<?php
require './vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$host = getenv ('HOST');
$dbname = getenv ('DBNAME');
$user = getenv ('USER');
$pass = getenv ('PASS');


$host = "ec2-54-83-19-244.compute-1.amazonaws.com";
$dbname = "d7bjsnfpoq8t0g";
$user = "wbynapcibehnee";
$password = "98356e1db7a8242d8f976a18f7b16c43bd9066ce9133f456abf24369a478513f";
$port = "5432";

$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;port=$port;password=$password";

$db = new PDO($dsn);

if($db){
    echo "Connected <br />".$db;
}else {
    echo "Not connected";
}