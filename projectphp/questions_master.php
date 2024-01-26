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
    <title>Question Master</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Qustion Master</h2>

    <a href="add_question.php"><button>Add Question</button></a><br>
    <a href="view_question.php"><button>View Question</button></a><br>

    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
