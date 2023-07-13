<?php


class métodosAdmin implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
    }

    public function showData(){}
    public function updateData(){}
    public function deleteData(){}
}

?>
