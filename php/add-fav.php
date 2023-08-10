<?php 
    require_once('../php/cone.php');
    require_once('../php/methods.php');
    $obj = new DataBase();
    $DBH = $obj->connect();

    extract($_POST);

    try{
        $stmt = $DBH->prepare("INSERT INTO shelf(`id_r`) VALUES ($id)");
        $stmt->execute();
        if($stmt){
            echo "funco";
        }else{
            echo "no funco";
        }
    }catch(PDOException $e){
        die("Error " . $e->getMessage());
    }
    



?>