<?php 

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO metadata
            (username, user_password)
            VALUES (?, ?)";

    $result = $pdo->prepare($sql);

    $result->execute([$username, $password]);

    echo "<br>";
    echo "User Has been added to the system."; 

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

    <button type="submit"> Register Account </button>

</form>

</body>