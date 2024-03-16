
<ul>
    <?php
try{
    $connection=new pdo ("mysql:host=localhost;dbname=osassuit;port=4306","root");

$id=$_GET['id'];

$result=$connection->query("select*from employee where id=$id");
$person=$result->fetch(PDO::FETCH_ASSOC);
foreach($person as $value)
{
    echo "<li>$value</li>";
}
}catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
</ul>