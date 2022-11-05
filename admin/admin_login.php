<?php
session_start();
//database connection
include('connection.php');
// Get values from form in login.php

$username = $_POST['Username'];
$password = $_POST['Password'];

// To prevent SQL injection
$username = stripcslashes($username);
$password = stripcslashes($password);
// $username = mysql_real_escape_string($username);
// $password = mysql_real_escape_string($password);

// Query the Db for username
$result = mysqli_query($dbconn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$res = mysqli_fetch_assoc($result);

if ($res !== null && $res['username'] == $username && $res['password'] == $password) {
    $_SESSION['name']=$res['username'];
    header('Location:index.php');
}

else {
    $_SESSION['msg']="Login Failed, enter valid information";
    header('Location:admin_login_page.php');
}
?>
