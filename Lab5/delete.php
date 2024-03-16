<?php
require ("db.php");
$db = new db();
try {

    $id = $_GET['id'];
    
    $db->delete_data("employee", "id='$id'");
    header("Location:list.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
$connection = null
    ?>