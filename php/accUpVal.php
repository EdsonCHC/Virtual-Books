<?php
require_once('../php/cone.php');
require_once('../php/interface.php');
require_once('../php/methods.php');
$obj = new MétodosUser();
extract($_POST);

try {
    $sql = "SELECT password FROM user where email = '$oldEmail'";
    $stmt = $obj->showData($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
if ($row['password'] === $oldPass) {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['tmp_name'];
        $route = "../src/user/" . $img_name;
        if ($oldImg !== "../src/user/user-man-1.png" && $oldImg !== "../src/user/user-man-2.png" && $oldImg !== "../src/user/user-woman-1.png" && $oldImg !== "../src/user/user-woman-2.png") {
            unlink($oldImg);
            move_uploaded_file($file, $route);
        }
        try {
            $sql = "UPDATE user SET name= ?, lastName= ?, email= ?, password= ?, img= ? WHERE email = '$oldEmail'";
            $arr = array(
                $name,
                $lastName,
                $email,
                $newPass,
                $route
            );
            if ($obj->updateData($sql, $arr)) {
                echo true;
            } else {
                echo false;
            }
        } catch (PDOException $e) {
            die("Error " . $e->getMessage());
        }
    }
} else {
    echo "bad-pass";
}
?>