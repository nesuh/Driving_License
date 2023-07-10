<?php
session_start();
if (isset($_SESSION['password'])) {
    require 'db_conn.php';
    if (isset($_GET['updatedid1'])) {
        $id = $_GET['updatedid1'];

        // Ensure $id is a valid integer value
        if (is_numeric($id)) {
            $update = "SELECT * FROM health WHERE id=$id";
            $result = mysqli_query($conn, $update);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Rest of your code to retrieve data and display the form
                $Dl = $row['Dl'];
                $Year = $row['year'];
                $Blood = $row['blood'];
                $Eye = $row['eye'];
                $GHR = $row['ghr'];
            } else {
                echo "No record found with the provided id.";
            }
        } else {
            echo "Invalid id value.";
        }
    } else {
        echo "No id parameter provided in the URL.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Status</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="Rnavbar">
        <a href="register.php">Personal</a>
        <a href="Health.php">Health Status</a>
        <a href="Practical.php">Practical Result</a>
        <a href="theory.php">Theory Result</a>
        <a href="logout.php">Logout</a>
    </nav>
</header> 
<form class="H" action="" method="post">
    <div class="Bform2">
        <div class="lo">
            <input type="number" name="Dl" id="Dl" placeholder="Driving License Number" required>
        </div>
        <div class="lo">
            <input type="number" name="year" id="year" placeholder="Year" required>
        </div>
        <div class="lo H">
            <div class="HL">
                <select name="Blood" id="blood">
                    <option value="">Blood Group</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="ab">AB</option>
                    <option value="o">O</option>
                    <option value="a+">A+</option>
                    <option value="b+">B+</option>
                </select>
            </div>
            <div class="HL">
                <label for="eye">Eye result</label>
                <select name="eye" id="eye">
                    <option value="full">Full</option>
                    <option value="semi">Semi</option>
                    <option value="null">Blind</option>
                </select>
            </div>
            <div class="HL">
                <label for="ghr">General Health Result</label>
                <select name="ghr" id="ghr">
                    <option value="excellent">Excellent</option>
                    <option value="very_good">Very Good</option>
                    <option value="bad">Bad</option>
                </select>
            </div>
        </div>
        <input class="reset" type="submit" name="health" value="Register"> 
        <a class="reset" href="display_health.php">Update</a>
    </div>
</form>
<?php
if (isset($_POST['health'])) {
    $Dl = $_POST['Dl'];
    $Year = $_POST['year'];
    $Blood = $_POST['Blood'];
    $Eye = $_POST['eye'];
    $GHR = $_POST['ghr'];
    $query = "INSERT INTO health (Dl, year, blood, eye, ghr) VALUES ('$Dl', '$Year', '$Blood', '$Eye', '$GHR')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("location: display_health.php");
    } else {
        die("Connection failed: " . mysqli_error($conn));
    }
}
}
else {
    header('location: login.php');
}
?>
</body>
</html>