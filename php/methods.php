<?php

/**
    * Clase contenedora para métodos CRUD */
class métodosCrud
{
    /**
     * Recibe una sentencia sql y la ejecuta segun corresponda*/

    // Registro
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();

        $STH = $DBH->prepare("INSERT INTO user (`name`,`lastName`,`email`,`password`,`img`) 
        values(?,?,?,?,?)");
        $STH->execute($arr);
    }
}
    // No tocar
?>

