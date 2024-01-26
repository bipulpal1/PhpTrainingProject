<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST['student_name'];
    $studentRollNo = $_POST['student_roll_no'];

    // Insert data into the database
    $query = "INSERT INTO `students` (`student_name`, `student_roll_no`) VALUES ('$studentName', '$studentRollNo')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Student added successfully!";
    } else {
        $error = "Error adding student: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="shortcut icon" href="favicons/favicon_login.ico" type="image/x-icon">
</head>
<body>
    <h2>Add Student</h2>

    <form method="post" action="">
        <label>Student Name:</label>
        <input type="text" name="student_name" required><br>

        <label>Student Roll No:</label>
        <input type="text" name="student_roll_no" required><br>

        <button type="submit">Add Student</button>
    </form>

    <?php
    if (isset($success)) {
        echo $success;
    } elseif (isset($error)) {
        echo $error;
    }
    ?>

    <br>
    <a href="student_master.php"><button>Back to Student Master</button></a>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>
