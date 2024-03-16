<?php
require ("db.php");
$db = new db();

if (isset ($_POST["login"])) {
    try {
        $stm = $db->get_data("employee", "firstname='{$_POST['firstname']}' and password='{$_POST['password']}'");

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        if ($result) {
            session_start();
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];

            header("location:list.php");
        } else {
            header("Location: login.php?error=1");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    //echo  var_dump($_FILES);
    $from = $_FILES["img"]["tmp_name"];
    $img = $_FILES["img"]["name"];
    move_uploaded_file($from, "./img/" . $img);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $address = validate($_POST['address']);
    $gender = validate($_POST['gender']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $country = validate($_POST['country']);
    $department = validate($_POST['department']);
    $errors = [];



    if (strlen($firstname) < 2) {
        $errors['firstname'] = "First name must be more than 2 char";
    }

    if (strlen($lastname) < 2) {
        $errors['lastname'] = "Last name must be more than 2 char";
    }

    if (strlen($address) < 2) {
        $errors['address'] = "Address must be more than 2 char";
    }

    if (strlen($username) < 2) {
        $errors['username'] = "Username must be more than 2 char";
    }

    if (strlen($password) < 2) {
        $errors['password'] = "Password must be more than 2 char";
    }

    if (count($errors) > 0) {
        header("Location:register.php?errors=" . json_encode($errors));
    } else {
        try {

            $stm = $db->insert_data(
                "employee",
                "firstname,lastname,address,gender,password,country,department,img",
                "'{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['address']}', '{$_POST['gender']}', '{$_POST['password']}', '{$_POST['country']}', '{$_POST['department']}', '{$img}'"
            );

            header("Location:login.php");

        } catch (PDOException $e) {
            echo $e->getMessage();
            header("Location:register.php?errors=$e");
        }
    }
}
function validate($data)
{
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>