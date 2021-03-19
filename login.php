<!DOCTYPE html>
<html lang="en">
    <head>
        <?php session_start(); ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A3 Health - Login</title>
    </head>
    <body>
        <?php include 'header.php'?>
        <p>Please login to your A3 Health account</p>
        <form action="login.php" method="POST">
            Username: <input type="text" name="username" required="required"> <br>
            Password: <input type="password" name="password" required="required"> <br>
            <input type="submit" value="Login">
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

    $query = mysqli_query($link, "SELECT * FROM users WHERE username='$username'");
    $row = mysqli_fetch_array($query);

    if(mysqli_num_rows($query) > 0) {
        if(($username == $row['username']) && password_verify($password, $row['password'])){
            $_SESSION['user'] = $username;
            $_SESSION['admin'] = $row['admin'];
            header ("location: home.php");
        } else {
            echo '<script>alert("Incorrect password");</script>';
            echo '<script>window.location.assign("login.php");</script>';
        }
    } else {
        echo '<script>alert("Incorrect username");</script>';
        echo '<script>window.location.assign("login.php");</script>';
    }
}
?>