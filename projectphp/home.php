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
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <a href="center_master.php"><button>Center Master</button></a><br>
    <a href="test_master.php"><button>Test Master</button></a><br>
    <a href="student_master.php"><button>Student Master</button></a><br>
    <a href="questions_master.php"><button>Questions Master</button></a><br>

    <a href="logout.php"><button>Logout</button></a>
</body>
</html>
