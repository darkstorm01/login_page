<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Create Account</title>
    <style>
        .red {
            color: red;
        }

        .name {
            font-size: 23px;
        }

        input[type=text] {
            width: 50%;
            height: 30px;
            border-radius: 0.1cm;
            padding-left: 10px;
            margin: 8px 0px;
        }

        input[type=submit] {
            width: 50%;
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

        h1 {
            background-color: blue;
            color: white;
            padding-left: 75px;
        }

        .img {
            width: 90%;
        }
    </style>

</head>

<body>
    <?php

    $nameErr = $emailErr = $pwdErr = $rpwdErr = "";
    $name = $email = $pwd = $rpwd = "";
    $flag = -1;
    $count = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "name is required";
            $flag = 0;
        } else {
            $name = test($_POST['name']);
            $count++;
        }

        if (empty($_POST['email'])) {
            $emailErr = 'email is required';
            $flag = 0;
        } else {
            $email = test($_POST['email']);
            $count++;
        }

        if (empty($_POST['pwd'])) {
            $pwdErr = 'Password is required';
            $flag = 0;
        } else {
            $pwd = $_POST['pwd'];
            $count++;
        }
        if (empty($_POST['rpwd'])) {
            $rpwdErr = 'Password is required';
            $flag = 0;
        } else if ($_POST['pwd'] != $_POST['rpwd']) {
            $rpwdErr = "Password doesn't match";
            $flag = 0;
        } else {
            $rpwd = $_POST['rpwd'];
            $count++;
        }
        $strname = "/^[a-zA-Z ]*$/";
        if (!preg_match($strname, $name)) {
            $nameErr = 'only letters and white space is allowed';
            $flag = 0;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid Email format';
            $flag = 0;
        }
    }


    function test($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($flag == -1 && $count == 4) {
        $mysqli_db = new mysqli('localhost', 'lkm', 'Mohan@1234', 'login');
        if ($mysqli_db->connect_error) {
            die("Connection failed: " . $mysqli_db->connect_error);
        }

        $n = "INSERT INTO user (name,email,password)
        VALUES ('$name','$email','$pwd')";

        $check = "SELECT email FROM user
                WHERE email='$email'";

        $res = mysqli_query($mysqli_db, $check);

        if (mysqli_num_rows($res) == 1)
            echo "Account already exists.";
        elseif (mysqli_query($mysqli_db, $n))
            echo "New record created successfully";
        else
            echo "Error: " . $n . "<br>" . mysqli_error($mysqli_db);

        $mysqli_db->close();
    }
    ?>
    <h1><b><br>Create Account</b><br><br></h1>
    <form method="post" action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'>

        <div class='container'>
            <row>
                <div class='col-sm-6'>
                    <span class='red'> * required field</span><br>
                    <br><label for='name'><span class='name'>Name:</span></label><br>
                    <input type='text' name='name' value='<?php echo $name; ?>' placeholder="Name...">
                    <span class='red'> * <?php echo $nameErr; ?></span>

                    <br><label for='email'><span class='name'>Email id:</span></label><br>
                    <input type='text' name='email' value='<?php echo $email; ?>' placeholder="Email...">
                    <span class='red'> * <?php echo $emailErr; ?></span>

                    <br><label for='pwd'><span class='name'>Password:</span></label><br>
                    <input type='text' name='pwd' value='<?php echo $pwd; ?>' placeholder="Password..">
                    <span class='red'> * <?php echo $pwdErr; ?></span>

                    <br><label for='rpwd'><span class='name'>Re-enter password:</span></label><br>
                    <input type='text' name='rpwd' value='<?php echo $rpwd; ?>' placeholder="Retype Password..">
                    <span class='red'> * <?php echo $rpwdErr; ?></span><br><br>

                    <div><input type='submit' value='Create'></div><br>
                </div>
                <div class='col-sm-6'>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><br></div>
                    </row>
                    <row>
                        <div class='col-sm-12'><img src='img.png' class='img'></div>
                    </row>
                </div>
            </row>
        </div>
    </form>
</body>

</html>