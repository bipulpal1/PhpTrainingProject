<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve all exam centers from the database
$query = "SELECT * FROM `exam_centers`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Exam Centers</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>View Exam Centers</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Center Name</th><th>Center Location</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['center_name'] . "</td>";
            echo "<td>" . $row['center_location'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No exam centers found.";
    }
    ?>

    <br>
    <a href="center_master.php"><button>Back to Center Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
