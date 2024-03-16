<?php
try {
    require ("db.php");
    $db = new db();
    $id = $_POST['id'];

    $from = $_FILES["img"]["tmp_name"];
    $img = $_FILES["img"]["name"];
    move_uploaded_file($from, "./img/" . $img);
    $db->update_data("employee", "firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}', address='{$_POST['address']}', gender='{$_POST['gender']}', password='{$_POST['password']}', department='{$_POST['department']}',img='{$img}'", "id='$id'");

    header("Location:list.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>