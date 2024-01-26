<?php
session_start();
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <div>
        <h2>Admin Login</h2>
        <form method="post" action="">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            
            <label>Password:</label>
            <input type="password" name="password" required><br>
            
            <button type="submit">Login</button>
        </form>
    </div>

    <?php if (isset($error)) { echo $error; } ?>
</body>
</html>
