<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Assuming that you have a list of test papers available
$queryTestPapers = "SELECT * FROM `test_papers`";
$resultTestPapers = mysqli_query($conn, $queryTestPapers);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $testPaperID = $_POST['test_paper_id'];
    $questionText = $_POST['question_text'];

    // Insert data into the database
    $query = "INSERT INTO `questions` (`test_paper_id`, `question_text`) VALUES ('$testPaperID', '$questionText')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Question added successfully!";
    } else {
        $error = "Error adding question: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Add Question</h2>

    <form method="post" action="">
        <label>Test Paper:</label>
        <select name="test_paper_id" required>
            <?php
            while ($row = mysqli_fetch_assoc($resultTestPapers)) {
                echo "<option value='" . $row['id'] . "'>" . $row['test_name'] . "</option>";
            }
            ?>
        </select><br>

        <label>Question Text:</label>
        <textarea name="question_text" rows="4" cols="50" required></textarea><br>

        <button type="submit">Add Question</button>
    </form>

    <?php
    if (isset($success)) {
        echo $success;
    } elseif (isset($error)) {
        echo $error;
    }
    ?>

    <br>
    <a href="questions_master.php"><button>Back to Questions Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
