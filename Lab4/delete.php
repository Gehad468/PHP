
<?php
try{
    $connection=new pdo ("mysql:host=localhost;dbname=osassuit;port=4306","root");

$id=$_GET['id'];
$connection->query("delete from employee where id =$id");
header("Location:list.php");
}catch(PDOException $e)
{
 echo $e->getMessage();
}

$connection=null
?>
