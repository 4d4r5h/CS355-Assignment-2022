<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    echo "<script> window.alert('Please sign in first.'); 
    	window.location='login.php'; </script>";
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=number],
        input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 10px 0 10px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=number]:focus,
        input[type=email]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .updatebtn {
            background-color: green;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.8;
            font-weight: bold;
            font-size: large;
        }

        .updatebtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }
    </style>
</head>

<body>

    <?php
    include 'dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $sql = "UPDATE std SET email = '$email', mobileNo = '$phone' where stdID=" . "'" . $_SESSION['stdid'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script> window.alert('Record updated successfully.'); 
        window.location='details.php'; </script>";
        } else {
            die("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
    }

    mysqli_close($conn);
    ?>

    <form method="post" action="update.php">
        <div class="container">
            <h1>Update</h1>
            <p>Please fill in this form to update your account.</p>
            <hr>

            <label><b>Mobile Number</b></label>
            <input type="number" placeholder="Enter Number" id="phone" name="phone" required>

            <label><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>
            <hr>
            <button type="submit" class="updatebtn">UPDATE</button>
        </div>
    </form>

</body>

</html>