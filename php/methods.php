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
        $DBH->close();
    }

    public function showData(){}
    public function updateData(){}
    public function deleteData(){}
    
}

?>

