<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Account Information</h1>
    </div>
    
        
        <form class="box" method="post" action="user_info.php">
            <table class="tc">

                <tr>
                    <td><p align="left">Username:
                            <?php
                                session_start();

                                $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                                
                                if($_SESSION["username"]==true) {
                                    echo $_SESSION["username"];
                                }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><p align="left">Full Name:
                            <?php
                                $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                                $sql = "SELECT full_name FROM user_details WHERE username='$_SESSION[username]'";
                                $result = mysqli_query($db, $sql) or die (mysqli_error($db));
                                while($row = mysqli_fetch_array($result)) {
                                    echo $row['full_name'];
                                }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><p align="left">Email:
                            <?php
                                $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                                $sql = "SELECT email FROM user_details WHERE username='$_SESSION[username]'";
                                $result = mysqli_query($db, $sql) or die (mysqli_error($db));
                                while($row = mysqli_fetch_array($result)) {
                                    echo $row['email'];
                                }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td><p align="left">Contact No:
                            <?php
                                $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                                $sql = "SELECT contact FROM user_details WHERE username='$_SESSION[username]'";
                                $result = mysqli_query($db, $sql) or die (mysqli_error($db));
                                while($row = mysqli_fetch_array($result)) {
                                    echo $row['contact'];
                                }
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    
                    <td><input type="submit" name="home_btn" value="Go back">
                        <?php
                            if (isset($_POST['home_btn'])) {
                                header("location: user_info.php");
                            }
                        ?>
                    </td>
                </tr>
                
            </table>
    
        </form>
    
</body>
</html>