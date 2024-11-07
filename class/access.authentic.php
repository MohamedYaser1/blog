<?php


if (!isset($_SESSION['user'])) {  
        
    // erorr message to login
    $_SESSION['login'] =  "<div class='text-center error'>Please Sign in to Enter</div>";
    // redirect to login page
    header('location:'.HOME.'sign-in.php');
}