<?php
session_start();
if(isset($_SESSION['password'])){
// Include the database connection file
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the driving license number (ID) from the form
    $dl_number = $_POST['Dl'];

    // Retrieve the start and end dates from the form
    $start_date = $_POST['sd'];
    $end_date = $_POST['ed'];

    // SQL queries to validate the ID in the 'register' and 'health' tables
    $register_validate_query = "SELECT `Dl` FROM `register` WHERE `Dl` = '$dl_number'";
    $health_validate_query = "SELECT `Dl` FROM `health` WHERE `Dl` = '$dl_number'";

    // Execute the validation queries and fetch the results
    $register_validate_result = mysqli_query($conn, $register_validate_query);
    $health_validate_result = mysqli_query($conn, $health_validate_query);

    // Check if the ID is valid in both tables
    if (mysqli_num_rows($register_validate_result) > 0 && mysqli_num_rows($health_validate_result) > 0) {
        // Redirect to the print_issue.php page with the necessary parameters
        header("Location: print_issue.php?Dl=$dl_number&sd=$start_date&ed=$end_date");
        exit();
    } else {
        echo "<p>Invalid ID. Please enter a valid driving license number.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue License</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="Rnavbar">
            <a href="issueL.php">Issue License</a>
            <a href="Renew.php">Renew License</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <form class="H" method="post" id="myform">
        <div class="Bform2">
        <div class="lo p">
            <label for="Dl">Driving License Number</label>
            <input type="number" name="Dl" id="Dl" required>
        </div>
        <div class="lo p">
            <label for="sd">Start Date</label>
            <input type="date" name="sd" id="sd" required>
        </div>
        <div class="lo p">
            <label for="ed">End Date</label>
            <input type="date" name="ed" id="ed" required>
        </div>
        <input class="reset " type="submit" name="issue" value="Issue">
        </div>
    </form>
    <footer></footer>
    <?php
}
else{
    header('location:login.php');
}
?>
</body>
</html>
