<?php


class métodosUser implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare("INSERT INTO user (`name`,`lastName`,`email`,`password`,`img`) 
        values(?,?,?,?,?)");
        $STH->execute($arr);
        $DBH = null;
    }
    public function showData($sql){
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        return $STH;
    }
    public function updateData($sql){}
    public function deleteData($dd){}
    
}

?>

