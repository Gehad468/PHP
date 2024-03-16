<?php
try {
    $connection = new pdo("mysql:host=localhost;dbname=osassuit;port=4306", "root");

    $id = $_GET['id'];

    $result = $connection->query("select*from person where id=$id");
    $person = $result->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>



<form action="update.php" method="post">
    <input type="text" name="id" id="id" value="<?php echo $person['id'] ?>">
    <label for="Fname">First Name</label>
    <input type="text" value="<?php echo $person['fistName'] ?>" name="Fname" id="Fname"><br>

    <label for="Lname">Last Name</label>
    <input type="text" name="Lname" value="<?php echo $person['lastName'] ?>" id="Lname"><br>

    <label for="address">Address</label>
    <input type="text" name="address" value="<?php echo $person['address'] ?>" id="address"><br>

    <label for="country">Country</label>
    <select name="country" value="<?php echo $person['country'] ?>" id="country">
        <option value="Egypt">Egypt</option>
        <option value="France">Tonis</option>
        <option value="Palestine">Palestine</option>
    </select><br>
    <label for="gender">Gender</label>
    <input type="radio" id="male" value="male" name="gender">
    <label for="male">Male</label>
    <input type="radio" id="female" value="female" name="gender">
    <label for="female">Female</label>

    <label for="username">Username</label>
    <input type="text" value="<?php echo $person['username'] ?>" name="username" id="username"><br>

    <label for="password">Password</label>
    <input type="password" value="<?php echo $person['password'] ?>" name="password" id="password"><br>
    <label for="department">Department</label>

    <select name="department" id="department">

        <option value="<?php echo $person['department'] ?>">Open Source</option>
        <option value="Professional web">Professional Web</option>
        <option value="User interface">User Interface</option>
    </select><br>
    <div class="button-group">
        <input type="submit" name="update" value="update">

    </div>
</form>