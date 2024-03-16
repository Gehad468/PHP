<ul>
    <?php
    require ("db.php");
    $db = new db();

    try {

        $id = $_GET['id'];

        $result = $db->get_data("employee", "id='$id'");
        $person = $result->fetch(PDO::FETCH_ASSOC);
        foreach ($person as $value) {
            echo "<li>$value</li>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
</ul>