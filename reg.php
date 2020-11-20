<?php
    session_start();

    //database connect
    $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db

    if (isset($_POST['reg_btn'])) {
        //saving input in variable
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $balance = $_POST['balance'];
        $password = $_POST['password'];
        
        //sql insert command
        $reg = "INSERT INTO user_details(username,full_name, email, contact, password, balance) VALUES('$username', '$fullname', '$email', '$contact', '$password', '$balance')";
        $run_reg = mysqli_query($db, $reg);
        //alert
        echo "<script>alert('Registered successfully!')</script>";
            
        echo "<script>window.open('login.php', '_self')</script>";
    }
    else{
        
    }
    if (isset($_POST['acc_btn'])) {
        echo "<script>window.open('login.php', '_self')</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Register</h1>
    </div>
    <form class="box" method="post" action="reg.php">
        <table>
            
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" class="textInput" required></td>
            </tr>
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="fullname" class="textInput" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" class="textInput" required></td>
            </tr>
            <tr>
                <td>Contact: </td>
                <td><input type="text" name="contact" class="textInput" required></td>
            </tr>
            <tr>
                <td>Initial Balance: </td>
                <td><input type="number" name="balance" class="textInput" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="reg_btn" value="Register"></td>
            </tr>

            
        </table>
    </form>
    <form class="box1" method="post" action="reg.php">
        <table>
            <tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                <td>
                    <input type="submit" name="acc_btn" value="Already have an account?">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>