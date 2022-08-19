<?php
    /*session_start();
    if(isset($_SESSION["username"]))
    {
        header("location: home.php");
    }*/
    $empty = false;
    $incorrect = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require '_dbConnectUsers.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];
        if(empty($username) || empty ($password))
        {
            $empty = true;
        }else if($password == $confirm_password){
            $query = "INSERT INTO `users` (`sno`, `username`, `password`) VALUES (NULL, '".$username."', '".$password."')";
            $result = mysqli_query($connect, $query);
            header ("location: https://coderview.netlify.app?signup=true");
        }else{
                $incorrect = true;
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


</head>
<body>
    <div class="main">
        <div class="right-container">
            <h3 class="login-text">Sign up</h3>
            <form action="sign_up.php" method="post" class="login-form">
                <label class="form-heading" for="username">Username:</label><br>
                <input type="text" maxlength="20" id="username" name="username" require><br>
                <label class="form-heading" for="password">Password:</label><br>
                <input type="password" id="password" name="password" require><br>
                <label class="form-heading" for="password">Confirm Password:</label><br>
                <input type="password" id="confirm-password" name="confirm-password" require><br>
                <input class = "submit-btn" type="submit" value="Sign up">
            </form>
            <?php
                if($empty){
                    echo "<h3 class='alert'>Please enter both your username and password!!</h3>";
                }else if($incorrect){
                    echo "<h3 class='alert'>Password Doesnt Match</h3>";
                }
            ?>
        </div>
        
    </div>
    
</body>
</html>
