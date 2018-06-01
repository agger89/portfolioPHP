<?php
class MyFileObject{
    private $filename;
    function __construct($fname){
        $this->filename = $fname;
        if(!file_exists($this->filename)){
            die('there is no file'.$this->filename);
        }
    }

    function isFile(){
        return is_file($this->filename);
    }
}
$file = new MyFileObject('data.txt');
//$file = new MyFileObject();
//$file->filename = 'data.txt';
$file->filename = 'asdfasfdasf.txt';
var_dump($file->isFile());
var_dump($file->filename);


/*
 MyFileObject : class
$file, $file2 : Instance
isFile : method, behavior (함수)
$this->>filename :
Instance variable, Instance field, Instance property
status
 */
?>