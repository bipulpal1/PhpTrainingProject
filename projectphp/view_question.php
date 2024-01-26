<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve all questions and their associated test papers from the database
$query = "SELECT q.id AS question_id, q.question_text, t.test_name
          FROM `questions` AS q
          INNER JOIN `test_papers` AS t ON q.test_paper_id = t.id";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Questions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>View Questions</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Question ID</th><th>Test Paper</th><th>Question Text</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['question_id'] . "</td>";
            echo "<td>" . $row['test_name'] . "</td>";
            echo "<td>" . $row['question_text'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No questions found.";
    }
    ?>

    <br>
    <a href="questions_master.php"><button>Back to Questions Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
