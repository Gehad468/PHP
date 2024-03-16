<?php
try {
    $connection = new pdo("mysql:host=localhost;dbname=osassuit;port=4306", "root");

    $id = $_POST['id'];
    $connection->query("update person set fistName='{$_POST['Fname']}', lastName='{$_POST['Lname']}', address='{$_POST['address']}', gender='{$_POST['gender']}', username='{$_POST['username']}', password='{$_POST['password']}', department='{$_POST['department']}' where id =$id");
    header("Location:list.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>