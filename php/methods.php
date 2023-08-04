<?php
require_once ('../php/cone.php');
require_once ('../php/interface.php');

class MétodosUser implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare("INSERT INTO `user` (`name`, `lastName`, `email`, `password`, `img`, `rol`) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $STH->execute($arr);
        $DBH = null;
    }
    public function showData($sql){
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        return $STH;
    }
    public function updateData($sql, $arr){
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare($sql);
        $STH->execute($arr);
        $DBH = null;
    }
    public function deleteData($sql){}
    
}

?>

