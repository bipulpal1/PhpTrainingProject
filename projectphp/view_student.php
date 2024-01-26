<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve all students from the database
$query = "SELECT * FROM `students`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>View Students</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Student Name</th><th>Student Roll No</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" . $row['student_roll_no'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found.";
    }
    ?>

    <br>
    <a href="student_master.php"><button>Back to Student Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
