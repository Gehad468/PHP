
<?php
    $fullName = $_POST['Fname'] . ' ' . $_POST['Lname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
    $department = $_POST['department'];

    echo "<h2>Thanks</h2>";
    if ($gender == 'male') {
        echo "Mr. $fullName<br>";
    } elseif ($gender == 'female') {
        echo "Ms. $fullName<br>";
    }
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Country:</strong> $country</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Skills:</strong> <br>";
    foreach ($skills as $skill) {
        echo "$skill<br>";
    }
    echo "</p>";
    echo "<p><strong>Department:</strong> $department</p>";
?> 