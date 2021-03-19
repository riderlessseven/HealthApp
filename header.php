<?php
if(isset($_SESSION['admin']) && $_SESSION['admin']){
    $adminbutton='<a class="nav-link" href="admin.php">Admin</a>';
} else {
    $adminbutton='';
}

if(isset($_SESSION['user'])){
    $navbuttons='<a class="nav-link" href="logout.php">Logout</a>';
} else {
    $navbuttons='<a class="nav-link" href="register.php">Register</a> </li> <li class="nav-item"> <a class="nav-link" href="login.php">Login</a>';
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">A3 Health</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarButtons">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php echo $adminbutton ?>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php echo $navbuttons ?>
                </li>
            </ul>
        </div>
    </div>
</nav>