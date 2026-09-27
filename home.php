<?php 

session_start();

if (!isset($_SESSION["username"])) {
        
    header("Location: login.php");
    exit;

}

?>

<h1> Home Page</h1>

<?php

echo "Hello " .$_SESSION["username"];

?>

<br><br>

<a href="logout.php"> Logout </a>