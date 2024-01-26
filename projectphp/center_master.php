<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Center Master</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Center Master</h2>

    <a href="add_center.php"><button>Add Center</button></a><br>
    <a href="view_center.php"><button>View Center</button></a><br>

    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
