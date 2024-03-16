<?php
session_start();
echo "<h1>Welcome " . $_SESSION['firstname'] . "<br></h1>";
if (!isset ($_SESSION['firstname'])) {
    header("Location:login.php");
}
?>


<a href="register.php">add</a>
<table border="2">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Password</th>
        <th>Address</th>
        <th>Gender</th>
        <!-- <th>Skills</th> -->
        <th>Country</th>
        <th>Department</th>
        <th>Image</th>
        <th>Operation</th>


    </tr>

    <?php
    require ("db.php");
    $db = new db();
    $result = $db->get_data("employee");
    while ($person = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($person as $key => $value) {
            if ($key == "img") {
                echo "<td><img src='./img/$value' width=100 height=100 ></td>";
            } else {
                echo "<td>$value</td>";
            }
        }
        echo "<td>
<a href='veiw.php?id={$person['id']}'> veiw</a>
<a href='edit.php?id={$person['id']}'> update</a>
<a href='delete.php?id={$person['id']}'> delete</a> </td>";

        echo "</tr>";
    }

    ?>

</table>