<?php
include_once '../php/cone.php';
include_once '../php/interface.php';

class MétodosUser implements plantilla
{
    public function insertData($arr)
    {
        $obj = new DataBase();
        $DBH = $obj->connect();
        $STH = $DBH->prepare("INSERT INTO `user` (`name`, `lastName`, `email`, `password`, `img`) 
            VALUES (?, ?, ?, ?, ?)");
        $STH->execute($arr);
        $DBH = null; // Cerrar la conexión
    }

    public function showData()
    {
        // Implementar el código para mostrar los datos
    }

    public function updateData()
    {
        // Implementar el código para actualizar los datos
    }

    public function deleteData()
    {
        // Implementar el código para eliminar los datos
    }
}


// class métodosUser implements plantilla
// {
//     public function insertData($arr)
//     {
//         $obj = new DataBase();
//         $DBH = $obj->connect();
//         $STH = $DBH->prepare("INSERT INTO user (`name`,`lastName`,`email`,`password`,`img`) 
//         values(?,?,?,?,?)");
//         $STH->execute($arr);
//         $DBH->close();
//     }

//     public function showData(){}
//     public function updateData(){}
//     public function deleteData(){}
    
// }

?>

