<?php
    class User{

        protected $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function register()
        {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $nickname = $_POST['nickname'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 원본 패스워드를 암호화된 패스워드로 변환

            $stmt = $this->connect->prepare("INSERT INTO users (email, name, nickname, password) VALUES('$email', '$name', '$nickname', '$password')");
            $stmt->execute();
        }
    }
?>