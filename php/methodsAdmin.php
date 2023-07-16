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

    public function showData(){//ni yo se como funciona no toquen
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->query("SELECT id, name, author, type, category FROM resource");
        return $STH;
    }
    public function updateData(){}
    public function deleteData(){}
}

?>
