<!DOCTYPE html>
<html lang="en">
    <head>
        <?php session_start(); ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A3 Health - Register</title>
    </head>
    <body>
        <?php include 'header.php'?>
        <p>Register for an A3 Health account</p>
        <form action="register.php" method="POST">
            Username: <input type="text" name="username" required="required"> <br>
            Password: <input type="password" name="password" required="required"> <br>
            <input type="submit" value="Register">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>

<?php
$link = new mysqli("localhost", "root", "", "health_app");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $bool = true;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($link, "Select * from users");
    while($row = mysqli_fetch_array($query)){
        if($username == $row['username']) {
            $bool = false;
            echo '<script>alert("Username already in use");</script>';
            echo '<script>window.location.assign("register.php");</script>';
        }
    }

    if($bool){
        mysqli_query($link, "INSERT INTO users (username, password) VALUES ('$username', '$hash')");
        mysqli_query($link, "INSERT INTO user_details (user_id) SELECT id FROM users WHERE username='$username'");
        echo '<script>alert("Successfully registered!");</script>';
        echo '<script>window.location.assign("register.php");</script>';
    }
}
?>