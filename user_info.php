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
        <h1>User Information</h1>
    </div>
    
        
        <form class="box" method="post" action="user_info.php">
            <table class="tc">

                <tr><td></td>
                    <td><p>Welcome
                            <?php
                                session_start();

                                $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                                
                                if($_SESSION["username"]==true) {
                                    echo $_SESSION["username"];
                                }
                            ?>
                        !</p>
                    </td>
                </tr>
                <tr>
                <td></td>
                    <td><input type="submit" name="info_btn" value="Account Information">
                        <?php
                            if (isset($_POST['info_btn'])) {
                                header("location: account_info.php");
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                <td></td>
                    <td><input type="submit" name="balance_btn" value="Balance">
                        <?php
                            if (isset($_POST['balance_btn'])) {
                                header("location: user_balance.php");
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                <td></td>
                    <td><input type="submit" name="send_btn" value="Send Money">
                        <?php
                            if (isset($_POST['send_btn'])) {
                                header("location: send_money.php");
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                <td></td>
                    <td><input type="submit" name="logout_btn" value="Log out">
                        <?php
                            if (isset($_POST['logout_btn'])) {
                                echo "<script>alert('You have been logged out!')</script>";
            
                                echo "<script>window.open('login.php', '_self')</script>";
                            }
                        ?>
                    </td>
                </tr>
                
            </table>
    
        </form>
   
</body>
</html>