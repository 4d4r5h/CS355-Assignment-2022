<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        a:link,
        a:visited {
            background-color: white;
            color: black;
            border: 3px solid green;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: medium;
            transition: background-color 0.3s;
        }

        a:hover,
        a:active {
            background-color: green;
            transition: background-color 0.3s;
            color: white;
        }

        input[type=submit] {
            width: 15%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            font-size: medium;
        }

        input[type=submit]:hover {
            background-color: #367d39;
        }

        div {
            text-align: center;
            padding: 200px 0px 200px 0px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            background-color: black;
            box-shadow: 10px 10px 5px green;
        }
    </style>
</head>

<body>
    <div>
        <a href="login.php">LOGIN</a>
        <br>
        <br>
        <a href="register.php">REGISTER</a>
    </div>
</body>

</html>