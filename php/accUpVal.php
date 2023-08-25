<?php

use Google\Service\AlertCenter\User;
require_once('../php/methods.php');
$obj = new MétodosUser();
extract($_POST);

if (isset($oldEmail)) {
    try {
        $user = $obj->showData("SELECT * FROM user where email ='$oldEmail'");
        $json = array();
        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                "name" => $row["name"],
                "lastName" => $row["lastName"],
                "email" => $row["email"],
                "img" => $row["img"]
            );
        }
        $json_str = json_encode($json);
        echo ($json_str);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if (isset($Pass)) {
    try {
        $sql = "SELECT password FROM user where email = '$lastEmail'";
        $stmt = $obj->showData($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
    if ($row['password'] === $Pass) {
        // Verificar si se ha proporcionado una nueva imagen
        if (isset($_FILES['img'])) {
            $file = $_FILES['img']['tmp_name'];
            $route = "../src/user/" . $img_name;
            if ($oldImg !== "../src/user/user-man-1.png" && $oldImg !== "../src/user/user-man-2.png" && $oldImg !== "../src/user/user-woman-1.png" && $oldImg !== "../src/user/user-woman-2.png") {
                unlink($oldImg);
            }
            move_uploaded_file($file, $route);
        }
        try {
            $sql = "UPDATE user SET name= ?, lastName= ?, email= ?";
            $arr = array(
                $name,
                $lastName,
                $email,
            );

            // Verificar si se ha proporcionado una nueva imagen y agregar la columna img si es necesario
            if (isset($_FILES['file'])) {
                $sql .= ", img= ?";
                $arr[] = $route;
            }

            $sql .= " WHERE email = '$lastEmail'";

            if ($obj->updateData($sql, $arr)) {
                echo true;
            } else {
                echo false;
            }
        } catch (PDOException $e) {
            die("Error " . $e->getMessage());
        }
    } else {
        echo "bad-pass";
    }
}
?>