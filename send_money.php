<?php
    session_start();

    $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect database

    if (isset($_POST['home_btn'])) {
        echo "<script>window.open('user_info.php', '_self')</script>";
    }
    if (isset($_POST['send_btn'])) {
        
        $receiver = $_POST['receiver'];
        $amount = $_POST['amount'];
        $password = $_POST['password'];
        
        $select_user = "select * from user_details where username='$_SESSION[username]' AND password='$password'";
        
        $run_user = mysqli_query($db,$select_user);
        
        //check password
        $check_user = mysqli_num_rows($run_user);
        
        
        
        
        
        if($check_user==1){
            
            
            $balance = "SELECT balance FROM user_details WHERE username = '$_SESSION[username]'";
            $run_balance = mysqli_query($db,$balance);
            while($row = mysqli_fetch_array($run_balance)) {
                //storing balance
                $trans = $row['balance'];
                //check balance
                if(($trans - $amount)<0) {
                    echo "<script>alert('Insufficient balance')</script>";
                    echo "<script>window.open('user_info.php', '_self')</script>";
                }
    
                else{
                    $reg = "INSERT INTO transaction(sender, receiver, amount) VALUES('$_SESSION[username]', '$receiver', '$amount')";
                    $run_reg = mysqli_query($db, $reg);
                    $send = "UPDATE user_details SET balance=(balance - '$amount') WHERE username = '$_SESSION[username]'";
                    $run_send = mysqli_query($db, $send);
                    $rec = "UPDATE user_details SET balance=(balance + '$amount') WHERE username = '$receiver'";
                    $run_rec = mysqli_query($db, $rec);
                    echo "<script>alert('Money sent successfully!')</script>";
                    if($_SESSION["username"]==true) {
                        echo "<script>window.open('user_info.php', '_self')</script>";
                    }
                }
            }
            
            
        }
        else{
            echo "<script>alert('Your password is incorrect')</script>";
            echo "<script>window.open('login.php', '_self')</script>";
        }
    }
    if (isset($_POST['home_btn'])) {
        echo "<script>window.open('user_info.php', '_self')</script>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Send Money</h1>
    </div>
    <form class="box" method="post" action="send_money.php">
        <table>
            
            <tr>
                <td><p align="left">Sender: 
                        
                    </p>
                </td>
                <td><p>
                        <?php
                            

                            $db = mysqli_connect("localhost", "root", "", "user_activity"); //connect db
                            
                            if($_SESSION["username"]==true) {
                                echo $_SESSION["username"];
                            }
                        ?>
                    </p>
                </td>
                
            </tr>
            <tr>
                <td>Receiver: </td>
                <td><input type="text" name="receiver" class="textInput" required></td>
            </tr>
            <tr>
                <td>Amount: </td>
                <td><input type="number" name="amount" class="textInput" required></td>
            </tr>
            
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="send_btn" value="Send Money"></td>
            </tr>
        </table>
    </form>
    <form class="box3" method="post" action="send_money.php">
        <table>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td><input type="submit" name="home_btn" value="Go back">
                </td>
            </tr>
        </table>
    </form>
        
</body>
</html>