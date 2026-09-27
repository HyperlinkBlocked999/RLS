<?php 

session_start();

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["user_password"];

    $sql = "SELECT * FROM metadata
            WHERE VALUES username = $username, user_password = $password ";

    $result = $pdo->prepare($sql);

    $result->execute([$username, $password]);

    $user = $result($username);

    if ($user && password_verify($password, $user ["password"])) {
            
        $_SESSION["username"] = $user["username"];

        header("Location: home.php");
        exit;

    } else {
        echo "Login incorrect.";
    }
 
}

?>

<!DOCTYPE html>
<html>
<body>

<form method="POST">

    Username:
    <input type="text" name="username">

    <br><br>

    Password:
    <input type="password" name="user_password">

    <br><br>

    <button type="submit"> Login </button>

</form>

</body>