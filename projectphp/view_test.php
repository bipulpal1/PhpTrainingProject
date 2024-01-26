<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve all test papers from the database
$query = "SELECT * FROM `test_papers`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Test Papers</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>View Test Papers</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Test Name</th><th>Test Subject</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['test_name'] . "</td>";
            echo "<td>" . $row['test_subject'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No test papers found.";
    }
    ?>

    <br>
    <a href="test_master.php"><button>Back to Test Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
