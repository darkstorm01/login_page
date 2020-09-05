<?php
session_start();
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Change Password</title>
    <style>
        .red {
            color: red;
        }

        .name {
            font-size: 23px;
        }

        input[type=text] {
            width: 30%;
            height: 30px;
            border-radius: 0.1cm;
            padding-left: 10px;
            margin: 8px 0px;
        }

        input[type=submit] {
            width: 30%;
            height: 40px;
            background-color: blue;
            color: white;
            border-radius: 0.1cm;
            padding-left: 10px;
            text-align: center;
            margin: 8px 0px;
            font-size: 25px;
        }

        input[type=submit]:hover {
            background-color: darkblue;
        }
    </style>

</head>

<body>
    <?php
    $opwd = $npwd = $rnpwd = "";
    $opwdErr = $rnpwdErr = "";
    $count = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['npwd'] != $_POST['rnpwd']) {
            $rnpwdErr = "New passwords doesn't match";
            $count++;
        } else if ($_POST['npwd'] == $_POST['opwd']) {
            $rnpwdErr = "New password is same of old password.";
            $count++;
        } else {
            $opwd = $_POST['opwd'];
            $npwd = $_POST['npwd'];
            $rnpwd = $_POST['rnpwd'];
        }
        if ($count == 0) {
            $mysqli_db = new mysqli('localhost', 'lkm', 'Lkm@4535', 'login');
            if ($mysqli_db->connect_error) {
                die("Connection failed: " . $mysqli_db->connect_error);
            }

            $check = "SELECT email FROM user
                WHERE email='$user' AND password='$opwd'";

            $req = "UPDATE user SET password='$npwd' WHERE email='$user'";
            $result = mysqli_query($mysqli_db, $check);
            if (mysqli_num_rows($result) == 1) {
                if (mysqli_query($mysqli_db, $req)) {
                    echo "Password changed successfully!";
                } else
                    echo "Unsuccessfull!";
            } else
                $opwdErr = "Incorrect password";

            $mysqli_db->close();
        }
    }
    ?>
    <form method="post" action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'>

        <div class='container'>
            <h1>Hello!</h1>
            <br><label for='opwd'><span class='name'>Old password:</span></label><br>
            <input type='text' name='opwd' value='<?php echo $opwd; ?>' placeholder="Old password..">
            <span class='red'><?php echo $opwdErr; ?></span>

            <br><label for='npwd'><span class='name'>New password:</span></label><br>
            <input type='text' name='npwd' value='<?php echo $npwd; ?>' placeholder="New Password..">

            <br><label for='rnpwd'><span class='name'>Retype New password:</span></label><br>
            <input type='text' name='rnpwd' value='<?php echo $rnpwd; ?>' placeholder="New password..">
            <span class='red'><?php echo $rnpwdErr; ?></span>

            <div><input type='submit' value='Change'></div><br>
        </div>
    </form>
</body>

</html>