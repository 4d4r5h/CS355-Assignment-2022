<?php
session_start();
if (isset($_SESSION['loggedin'])) {
  echo "<script> window.alert('You are already logged in.'); 
    window.location='details.php'; </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
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
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 10px 0 10px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .loginbtn {
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

    .loginbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .register {
      background-color: #f1f1f1;
      text-align: center;
    }

    #alert {
      display: none;
    }
  </style>
</head>

<body>


  <h2>Login Form</h2>

  <form action="login.php" method="post">

    <div class="container">
      <h1>Login</h1>

      <p>Please fill in this form to login.</p>

      <div id="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Alert!</strong> Invalid credentials.
      </div>

      <hr>
      <label><b>Student ID</b></label>
      <input type="text" placeholder="Enter ID" name="stdid" id="stdid" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>

      <button type="submit" class="loginbtn">LOGIN</button>
    </div>

    <div class="container register">
      <p>Don't have an account? <a href="register.php">Register</a>.</p>
    </div>
    </div>
  </form>

  <?php
  include 'dbconnect.php';

  $sql = "SELECT * FROM std";
  $result = mysqli_query($conn, $sql);
  if (empty($result)) {
    $sql = "CREATE TABLE std (stdID varchar2(10) PRIMARY KEY, passwd varchar2(255) NOT NULL, stdName varchar2(20) NOT NULL,
            email varchar2(30) NOT NULL, mobileNo int NOT NULL, department varchar2(20) NOT NULL,
            age int NOT NULL, DoJ date NOT NULL);";

    $result = mysqli_query($conn, $sql);
    if ($result == false) {
      die("Error creating table: " . mysqli_error($conn));
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stdid = $_POST["stdid"];
    $password = $_POST["password"];
    
    $sql = "Select * from std where stdID = '$stdid' AND passwd = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['loggedin'] = true;
      $_SESSION['stdid'] = $stdid;
      echo "<script> window.alert('Logged in successfully.'); 
        window.location='details.php'; </script>";
    } else {
      // die("Error: " . $sql . "<br>" . mysqli_error($conn));
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