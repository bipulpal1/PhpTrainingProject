<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $testName = $_POST['test_name'];
    $testSubject = $_POST['test_subject'];

    // Insert data into the database
    $query = "INSERT INTO `test_papers` (`test_name`, `test_subject`) VALUES ('$testName', '$testSubject')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Test paper added successfully!";
    } else {
        $error = "Error adding test paper: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Test Paper</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Add Test Paper</h2>

    <form method="post" action="">
        <label>Test Name:</label>
        <input type="text" name="test_name" required><br>

        <label>Test Subject:</label>
        <input type="text" name="test_subject" required><br>

        <button type="submit">Add Test</button>
    </form>

    <?php
    if (isset($success)) {
        echo $success;
    } elseif (isset($error)) {
        echo $error;
    }
    ?>

    <br>
    <a href="test_master.php"><button>Back to Test Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
