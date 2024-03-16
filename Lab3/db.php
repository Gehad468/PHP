
<?php
try{
    $connection=new pdo ("mysql:host=localhost;dbname=osassuit;port=4306","root","");
    $connection->query("INSERT INTO person (fistName,lastName,address,gender,username,password,department) 
        VALUES ('{$_POST['Fname']}', '{$_POST['Lname']}', '{$_POST['address']}'
        , '{$_POST['gender']}', '{$_POST['username']}', '{$_POST['password']}', 
        '{$_POST['department']}')");
}catch(PDOException $e)
{
echo $e->getMessage();
}

header("location:list.php");

?>

