<?php
    class Person{
        private $name;
        public function sayHi(){
            echo ("hi, im {$this->name}.");
        }
        public function setName($_name){
            $this->ifEmptyDie($_name);
            $this->name = $_name;
        }
        public function getName(){
            return $this->name;
        }
        private function ifEmptyDie($value){
            if(empty($value)){
                die('I need name');
            }
        }
    }
    $egoing = new Person();
//    $egoing->name = 'egoing';
    $egoing->setName('egoing');
    $egoing->sayHi();
    echo($egoing->getName());
?>