<?php
interface plantilla{
    public function insertData($arr);
    public function showData($sql);
    public function updateData($sql,$arr);
    public function deleteData($sql, $id);
}

?>