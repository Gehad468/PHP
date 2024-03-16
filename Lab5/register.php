<?php
$errors = [];
if(isset($_GET['errors']) && !empty($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}
?>
<form action="empController.php" method="post" enctype="multipart/form-data">
    <label for="firstname">First Name</label>
    <input type="text" placeholder="Enter your first name" name="firstname" id="firstname">
    <?php
    if (isset($errors['firstname'])) {
        echo $errors['firstname'];
    }
    ?>
    <br>
    <label for="lastname">Last Name</label>
    <input type="text" placeholder="Enter your last name" name="lastname" id="lastname">
    <?php
    if (isset($errors['lastname'])) {
        echo $errors['lastname'];
    }
    ?>
    <br>
    <label for="address">Address</label>
    <input type="text" placeholder="Enter your address" name="address" id="address">
    <?php
    if (isset($errors['address'])) {
        echo $errors['address'];
    }
    ?>
    <br>
    <label for="country">Country</label>
    <select name="country" id="country">
        <option value="Egypt">Egypt</option>
        <option value="France">Tonis</option>
        <option value="Palestine">Palestine</option>
    </select>
    <?php
    if (isset($errors['country'])) {
        echo $errors['country'];
    }
    ?>
    <br>

    <label for="gender">Gender</label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <?php
    if (isset($errors['gender'])) {
        echo $errors['gender'];
    }
    ?>
<br>
    <label for="skills">Skills</label></br>
    <input type="checkbox" id="php" name="skills[]" value="PHP">
    <label for="php">PHP</label><br>
    <input type="checkbox" id="mysql" name="skills[]" value="MySQL">
    <label for="mysql">MySQL</label><br>
    <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
    <label for="javascript">JavaScript</label><br>
    <input type="checkbox" id="python" name="skills[]" value="Python">
    <label for="python">Python</label><br>


    <label for="username">Username</label>
    <input type="text" placeholder="Enter your username" name="username" id="username">
    <?php
    if (isset($errors['username'])) {
        echo $errors['username'];
    }
    ?>
    <br>
    <label for="password">Password</label>
    <input type="password" placeholder="Enter your password" name="password" id="password">
    <?php
    if (isset($errors['password'])) {
        echo $errors['password'];
    }
    ?>
    <br>

    <label for="department">Department</label>
    <select name="department" id="department">
        <option value="Open source">Open Source</option>
        <option value="Professional web">Professional Web</option>
        <option value="User interface">User Interface</option>
    </select>
    <?php
    if (isset($errors['department'])) {
        echo $errors['department'];
    }
    ?>
    <br>

    <label for="img">Choose Image</label>
    <input type="file" name="img" id="img"><br>

    <div class="button-group">
        <input type="submit" value="Submit" name="submit">
        <input type="reset" value="Reset" >
    </div>
</form>