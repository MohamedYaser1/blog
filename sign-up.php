<?php 
include("./parts/navbar.php");
require('class/sign.class.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="login">
        <h1 class="text-center">Sign Up</h1><br>

        <!-- start form -->
        <form action="" method="POST" class="text-center">
            <p>Full Name</p>
            <input type="text" name="fullname" required>
            <p>User Name</p>
            <input type="text" name="username" required>
            <p>Password</p>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="submit" class="btn-primary" value="Sign UP">
        </form>
        <!-- end form -->
        <p class="text-center">Created By <a href="#">Mohamed Yaser</a></p>
    </div>
</body>

</html>

<?php


if (isset($_POST['submit'])) {
    
    $signin = new Sign;

    $signin->full_name = $_POST['fullname'];
    $signin->user_name = $_POST['username'];
    $signin->password = md5($_POST['password']);

    $signin->sign_up();

    
}


include('./parts/footer.php');