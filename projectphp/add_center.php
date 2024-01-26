<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $centerName = $_POST['center_name'];
    $centerLocation = $_POST['center_location'];

    // Insert data into the database
    $query = "INSERT INTO `exam_centers` (`center_name`, `center_location`) VALUES ('$centerName', '$centerLocation')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Exam center added successfully!";
    } else {
        $error = "Error adding exam center: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exam Center</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Add Exam Center</h2>

    <form method="post" action="">
        <label>Center Name:</label>
        <input type="text" name="center_name" required><br>

        <label>Center Location:</label>
        <input type="text" name="center_location" required><br>

        <button type="submit">Add Center</button>
    </form>

    <?php
    // if (isset($success)) {
    //     echo $success;
    // } elseif (isset($error)) {
    //     echo $error;
    // }

    if (isset($success)) {
        echo "<p class='success-message'>$success</p>";
    } elseif (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>

    <br>
    <a href="center_master.php"><button>Back to center Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
