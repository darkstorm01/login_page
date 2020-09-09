<?php
session_start();
$mysqli_db = new mysqli('localhost', 'lkm', 'Mohan@1234', 'login');

if ($mysqli_db->connect_error) {
    die("Connection failed: " . $mysqli_db->connect_error);
}
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$log = "SELECT * FROM user WHERE email='$email' AND password='$pwd'";

$result = mysqli_query($mysqli_db, $log);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['user'] = $email;
    header('location:index.php');
} else {
    echo "Invalid emailId or Password";
}
