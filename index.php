<?php
session_start();
if (!isset($_SESSION['user']))
    header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class='container'>
        <row>
            <div class='col-sm-12'>
                <h1>Welcome to our web page!</h1>
            </div>
        </row>
        <row>
            <div class='col-sm-11'><br></div>
            <div class='col-sm-1'>
                <a href='logout.php'><u>Log out</u></a>
                <a href='change_pwd.php'><u>Change password</u></a>
            </div>
        </row>
    </div>
</body>

</html>