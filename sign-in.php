<?php 
include("./config/connect.php");

include("./parts/navbar.php");
require('class/sign.class.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign In</title>
</head>

<?php 

if (isset($_SESSION["notavailable"])) {
    echo $_SESSION["notavailable"];
    unset($_SESSION["notavailable"]);
}


 if (isset($_SESSION['login'])) 
{
    echo $_SESSION['login'];
    unset($_SESSION['login']);
} 
?>

<body>
    <div class="login">
        <h1 class="text-center">Sign In</h1><br>

        <!-- start form -->
        <form action="" method="POST" class="text-center">

            <p>User Name</p>
            <input type="text" name="username" required>
            <p>Password</p>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="submit" class="btn-primary" value="Login">
        </form>
        <!-- end form -->
        <p class="text-center">Created By <a href="#">Mohamed Yaser</a></p>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    
    $signin = new Sign;

    $signin->user_name = $_POST['username'];
    $signin->password = md5($_POST['password']);

    $signin->sign_in();
}

include('./parts/footer.php');