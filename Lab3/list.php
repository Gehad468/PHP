<a href="form.html">add</a>
<table border="2">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Country</th>
        <th>Gender</th>
        <!-- <th>Skills</th> -->
        <th>User Name</th>
        <th>Password</th>
        <th>Department</th>
        <th>Operation</th>
    </tr>

    <?php
    $connection = new pdo("mysql:host=localhost;dbname=osassuit;port=4306", "root", "");
    $result = $connection->query("select * from person");
    while ($person = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($person as $value) {
            echo "<td>$value</td>";
        }
        echo "<td>
<a href='veiw.php?id={$person['id']}'> veiw</a>
<a href='edit.php?id={$person['id']}'> update</a>
<a href='delete.php?id={$person['id']}'> delete</a> </td>";

        echo "</tr>";
    }

    ?>

</table>