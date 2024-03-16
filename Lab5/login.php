<?php
if(isset($_GET['error']))
{
    echo "invalid username or password ";
}
?>
<form action="empController.php" method="post">
   username <input type="text" name="firstname" id="firstname">
   password <input type="password" name="password">
   <input type="submit" value="Login" name="login">
</form>