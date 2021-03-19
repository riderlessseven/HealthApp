<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A3 Health - Administrator Settings</title>
        <?php
        session_start();
        $link = mysqli_connect("localhost", "root", "", "health_app");
        if(!$_SESSION['user']) {
            header("location: index.php");
        }
        $user = $_SESSION['user'];
        $query = mysqli_query($link, "SELECT * FROM users, user_details WHERE username = '$user'");
        $row = mysqli_fetch_array($query);
        if($_SESSION['admin'] == 0) {
            header("location: home.php");
        }
        ?>
    </head>
    <body>
        <?php include 'header.php'?>
        <p>Administrator settings for <?php Print "$user"?>!</p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>