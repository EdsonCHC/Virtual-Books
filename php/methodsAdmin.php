<?php


class métodosAdmin implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare("INSERT INTO resource(`name`, `author`, `type`, `category`, `description`,`src`, `img`)
        VALUES (?,?,?,?,?,?,?)");
        $STH->execute($arr);
        $DBH = null;
    }

    public function showData($sql){//ni yo se como funciona no toquen
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query($sql);
        return $STH;
    }
    public function updateData($sql){}
    public function deleteData($sql){}
}

?>
