<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        #alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
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
        input[type=text],
        input[type=password],
        input[type=date],
        input[type=age],
        input[type=number],
        input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 10px 0 10px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus,
        input[type=date]:focus,
        input[type=age]:focus,
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
        .registerbtn {
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

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        #alert {
            display: none;
        }
    </style>
</head>

<body>

    <form method="post" action="register.php">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>

            <div id="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Alert!</strong> Student ID should be unique.
            </div>

            <hr>

            <label><b>Student ID</b></label>
            <input type="text" placeholder="Enter ID" name="stdid" id="stdid" required>

            <label><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <label><b>Date</b></label>
            <input type="date" placeholder="Enter Date" name="date" id="date" required>

            <label><b>Age</b></label>
            <input type="number" placeholder="Enter Age" id="age" name="age" required>

            <label><b>Department</b></label>
            <input type="text" placeholder="Enter Department" name="dept" id="dept" required>

            <label><b>Mobile Number</b></label>
            <input type="number" placeholder="Enter Number" id="phone" name="phone" required>

            <label><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>

            <hr>
            <button type="submit" class="registerbtn">REGISTER</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
    </form>

    <?php
    session_start();
    if (isset($_SESSION['loggedin'])) {
        echo "<script> window.alert('You are already logged in.'); 
    window.location='details.php'; </script>";
    }

    include 'dbconnect.php';

    $sql = "SELECT * FROM std";
    $result = mysqli_query($conn, $sql);
    if (empty($result)) {
        $sql = "CREATE TABLE std (stdID varchar(10) PRIMARY KEY, passwd varchar(255) NOT NULL, stdName varchar(20) NOT NULL,
            email varchar(30) NOT NULL, mobileNo int NOT NULL, department varchar(20) NOT NULL,
            age int NOT NULL, DoJ date NOT NULL);";

        $result = mysqli_query($conn, $sql);
        if ($result == false) {
            die("Error creating table: " . mysqli_error($conn));
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stdid = $_POST["stdid"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $date = $_POST["date"];
        $age = $_POST["age"];
        $dept = $_POST["dept"];
        $phone = $_POST["phone"];
        $sql = "INSERT INTO std (stdID, passwd, stdName,
            email, mobileNo, department, age, DoJ) VALUES ( '$stdid', '$password', '$name',
            '$email', $phone, '$dept', $age, '$date');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script> window.alert('New record created successfully.'); 
        window.location='login.php'; </script>";
        } else {
            echo "
      <script>
        document.getElementById('alert').style.display='block';
      </script>
    ";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>