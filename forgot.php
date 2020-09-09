<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Forgot password</title>
    <style>
        .name {
            font-size: 23px;
            color: blue;
        }

        input[type=text] {
            width: 100%;
            height: 40px;
            font-size: 20px;
            border-radius: 0.1cm;
            padding-left: 10px;
            margin: 8px 0px;
        }

        input[type=submit] {
            width: 100%;
            height: 40px;
            background-color: blue;
            color: white;
            padding-left: 10px;
            text-align: center;
            margin: 8px 0px;
            font-size: 25px;
            border-radius: 0.2cm;
        }

        input[type=submit]:hover {
            background-color: darkblue;
        }

        p {
            margin-top: 3px;
            background-color: blue;
            color: white;
            padding-left: 19%;
            border-radius: 0.3cm;
            font-size: 23px;
        }

        #req {
            border: 2px solid black;
            margin-top: 10%;
        }

        body {
            background-image: url('log.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli("localhost", "lkm", "Mohan@1234", "login");
        if ($conn->connect_error)
            die("Connection failed" . $conn->connect_error);
    }
    ?>

</head>

<body>
    <form method='post' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class='container'>
            <h1>We are to help you out!</h1>
            <row>
                <div class='col-sm-4'></div>

                <div class='col-sm-4' id='req'>
                    <p><b><br>Reset password</b><br><br></p>

                    <br><label for='email'><span class='name'>Email id:</span></label><br>
                    <input type='text' name='email' placeholder="Email id..">

                    <input type='submit' value='Send'><br>

                </div>
                <div class='col-sm-4'></div>
            </row>
        </div>
    </form>
</body>

</html>