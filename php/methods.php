<?php

/**
    * Clase contenedora para métodos CRUD */

class métodosCrud
{
    /**
     * Recibe una sentencia sql y la ejecuta segun corresponda*/
    // Inicio Sesión

    // Registro
    public function insertData($arr)
    {
        $obj = new conexión();
        $conex = $obj->conectar();

        /** Registro datos user */
        $sql = "INSERT INTO `user` 
        (`name`,`lastName`,`email`,`password`, `img`) 
        values('$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]')";

        return $result = mysqli_query($conex, $sql);  
    }
}

?>