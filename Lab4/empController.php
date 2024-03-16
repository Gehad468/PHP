<?php
if(isset($_POST["login"]) ) {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=osassuit;port=4306", "root", "");
        $stm = $connection->prepare("SELECT * FROM employee WHERE firstname=? AND password=?");
        $stm->execute([$_POST['firstname'], $_POST['password']]);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        if($result) {
            session_start();
            // $_SESSION['username'] = $result['username'];
            // $_SESSION['password'] = $result['password'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];    
            
            header("location:list.php");
        } else {
            header("Location: login.php?error=1");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else
{
//echo  var_dump($_FILES);
 $from=$_FILES["img"]["tmp_name"];
 $img=$_FILES["img"]["name"];
move_uploaded_file($from,"./img/".$img);
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
    header("Location:register.php?errors=".json_encode($errors));
} else {
    try {
        $connection = new pdo("mysql:host=localhost;dbname=osassuit;port=4306", "root", "");
        $stm = $connection->prepare("insert into employee (firstname,lastname,address,gender,password,country,department,img)values (?,?,?,?,?,?,?,?)");
        $stm->execute([$firstname, $lastname, $address, $gender,  $password,$country, $department,$img]);

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
//echo $firstname . " " . $lastname . " ";
?>