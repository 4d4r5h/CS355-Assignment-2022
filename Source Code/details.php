<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    echo "<script> window.alert('Please sign in first.'); 
    	window.location='login.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <style>
        table {
            border-collapse: collapse;
            margin: auto;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 50px;
            height: 50%;
            width: 50%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: medium;
            font-weight: bold;
        }

        .theadtr {
            background-color: #005cab;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .theadth {
            padding: 13px 13px;
            text-align: center;
        }

        .tbodyth {
            border: 1.5px solid black;
            padding: 13px 13px;
            text-align: center;
        }

        .tbodytd {
            border: 1.5px solid black;
            padding: 13px 13px;
            text-align: center;
        }

        div {
            overflow-x: auto;
            text-align: center;
            background-attachment: fixed;
            background-size: cover;
            padding: 10px;
        }

        * {
            margin: 0px;
        }

        a:link,
        a:visited {
            background-color: white;
            color: black;
            border: 2px solid green;
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
            background-color: #ff4000;
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
            background-color: #e63900;
        }
    </style>
</head>

<body>

    <div>
        <a href="update.php">UPDATE</a>
        <a href="logout.php">LOGOUT</a>
        <div>
            <table>
                <thead>
                    <tr class="theadtr">
                        <th class="theadth" scope="col">Attribute</th>
                        <th class="theadth" scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include 'dbconnect.php';
                    $sql = "SELECT * FROM std WHERE stdID=" . "'" . $_SESSION['stdid'] . "'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr> <th class='tbodyth' scope='row'>" . "Student ID" . "</th>
<td class='tbodytd'>" . $row['stdID'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Password" . "</th>
<td class='tbodytd'>" . $row['passwd'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Student Name" . "</th>
<td class='tbodytd'>" . $row['stdName'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Date of Joining" . "</th>
<td class='tbodytd'>" . $row['DoJ'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Age" . "</th>
<td class='tbodytd'>" . $row['age'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Department" . "</th>
<td class='tbodytd'>" . $row['department'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Mobile Number" . "</th>
<td class='tbodytd'>" . $row['mobileNo'] . "</td> </tr>
<tr> <th class='tbodyth' scope='row'>" . "Email" . "</th>
<td class='tbodytd'>" . $row['email'] . "</td> </tr>
";
                    }

                    mysqli_close($conn);
                    ?>

                </tbody>
            </table>
            <br>
        </div>
    </div>

</body>

</html>