<?php

    class Main{

        public function __construct($mydb){
            $this->dbname = $mydb;
        }

        public function articles(){
            $stmt = $this->dbname->prepare('SELECT * FROM article');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function users($id){
            $stmt = $this->dbname->prepare('SELECT * FROM users WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function pics($id){
            $stmt = $this->dbname->prepare('SELECT * FROM pics WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function likes($article_id){
            $stmt = $this->dbname->prepare('SELECT * FROM likes WHERE article_id = :article_id');
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function comments($article_id){
            $stmt = $this->dbname->prepare('SELECT * FROM comments JOIN users ON comments.users_id = users.id WHERE article_id = :article_id');
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }


    }



?>