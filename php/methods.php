<?php
require_once ('../php/cone.php');
require_once ('../php/interface.php');

class MétodosUser implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare("INSERT INTO `user` (`name`, `lastName`, `email`, `password`, `img`, `rol`, `dateReg`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $STH->execute($arr);
        $DBH = null;
    }
    public function showData($sql) : PDOStatement {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        $DBH = null;
        return $STH;
    }
    public function updateData($sql, $arr) : bool{
        $obj = new DataBase();
        $DBH = $obj->connect();
        try{
            $STH = $DBH->prepare($sql);
            $STH->execute($arr);
            $DBH = null;
            return true;
        }catch(PDOException $e){
            die("Error ". $e->getMessage());
        }
    }
    public function deleteData($sql){
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        $DBH = null;
    }
}

class Comentario implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare ("INSERT INTO `comment` (`description`, `valuation`, `id_c`, `id_rec`) 
        VALUES (?, ?, ?, ?)");
        $STH->execute($arr);
        $DBH = null;
    }

    public function showData($sql) : PDOStatement {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        return $STH;
    }
    
    public function updateData($sql, $arr){}
    public function deleteData($sql){}
    
}

?>
