<?php
try {
    $connection = new pdo("mysql:host=localhost;dbname=osassuit;port=4306", "root","");

    $id = $_POST['id'];
    $connection->query("update employee set firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}', address='{$_POST['address']}', gender='{$_POST['gender']}', password='{$_POST['password']}', department='{$_POST['department']}',img='{$_POST['img']}' where id =$id");
    header("Location:list.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>