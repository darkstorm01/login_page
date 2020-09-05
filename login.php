<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Login</title>
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


</head>

<body>
    <form method='post' action='val_login.php'>
        <div class='container'>
            <row>
                <div class='col-sm-4'></div>

                <div class='col-sm-4' id='req'>
                    <p><b><br>Login to your account</b><br><br></p>
                    <br><label for='email'><span class='name'>Email id:</span></label><br>
                    <input type='text' name='email' placeholder="Email id..">

                    <br><label for='pwd'><span class='name'>Password:</span></label><br>
                    <input type='text' name='pwd' placeholder="Password..">

                    <input type='submit' value='Login'><br>

                    <div style='text-align:center'><span>Don't have one? </span><a href='register.php'><u>Create an account</u></a></div>
                    <div style='text-align:center'><a href='forgot.php'><u>Forgot password?</u></a></div>
                </div>
                <div class='col-sm-4'></div>
            </row>
        </div>
    </form>
</body>

</html>