<?php
include('connect.php');
$password = $_POST['password'];
$email = $_POST['email'];

// check if the user is registered on the system
$statement = "SELECT `user_email`,`user_password`,`full_name` FROM `users` WHERE `user_email` = '$email' AND `user_password` = '$password' ";
$result = $connection->query($statement);
$rowcount = mysqli_num_rows($result);

// if user is not registered, or entered the wrong login credentials alert error
if ($rowcount < 1) {
    echo '<script>alert("Error! Username or password is incorrect. Please try again")</script>';
    header("Location: ../login.php");
    exit();
} else {
    // if user is registered, log them in
    header("Location: ../dashboard.php");
    exit();
}

$connection->close();
