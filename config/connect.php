<?php

session_start();

define('HOME', 'http://localhost/blog-test/');
define('LOCALHOST', 'localhost');
define('DB_username','root');
define('DB_password','');
define('DB_name','blog');


$conn = new mysqli(LOCALHOST, DB_username, DB_password, DB_name);
if ($conn->connect_error) {
    die(mysqli_error($conn));
}