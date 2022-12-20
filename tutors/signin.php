<?php session_start(); require_once 'config/db.php';?>

<!DOCTYPE html>
<html lang="UTF-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>login | Find a tutor</title>
    <link rel="stylesheet" href="src/signin.css" />
    <link rel = "shortcut icon" href="Find.png">
</head>
<body>
    
    <div class="center" id = "center">
        <h1>Login</h1>
        <div class="logo" id = "logo">
            <a href="index.php"><img src="img/Find-removebg-preview.png" alt=""></a>
        </div>
        <form method="post" action="signin_db.php">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="txt_field" id = "txt_field">
                <input type="email"  name="email" required>
                <span></span>
                <label for="email">Username</label>
            </div>
            <div class="txt_field" id = "txt_field">
                <input type="password" name="tpassword" required>
                <span></span>
                <label for="tpassword">Password</label>
            </div>
            <input type="submit" name="signin" value = "LOGIN">
            <div class="signup_link">
                Don't have an account? <a href = "signup.php">Signup</a>
            </div>
            <div class="buttonicon">
                <a href="index.php"><span class="material-symbols-outlined" style="color: #2691d9;">
                    home_app_logo
                </span></a>
                <a href="signup.php"><span class="material-symbols-outlined" style="color: #2691d9;">
                    undo
                </span></a>
            </div>
        </form>
    </div>
</body>
</html>