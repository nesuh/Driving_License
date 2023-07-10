<?php
session_start();
if (isset($_SESSION['password'])) {
    require 'db_conn.php';
    if (isset($_GET['updatedid1'])) {
        $id = $_GET['updatedid1'];

        // Ensure $id is a valid integer value
        if (is_numeric($id)) {
            $update = "SELECT * FROM health WHERE id='$id'";
            $result = mysqli_query($conn, $update);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Rest of your code to retrieve data and display the form
                $id = $row['id'];
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
}
else {
    header('location: login.php');
    exit;
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
            <a href="register.php"> Personal</a>
            <a href="Health.php">Health Status</a>
            <a href="Practical.php">Practical Result</a>
            <a href="theory.php">theory Result</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <form action="" method="post">
        <div class="Bform2">
            <div class="lo">
                <label for="Dl">Driving License Number</label>
                <input type="number" name="Dl" id="Dl" value="<?php echo $Dl; ?>">
            </div>
            <div class="lo">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" value="<?php echo $Year; ?>">
            </div>
            <div>
                <label for="blood">Blood Group</label>
                <select name="Blood" id="blood">
                    <option value="A" <?php if ($Blood === 'A') echo "selected"; ?>>A</option>
                    <option value="B" <?php if ($Blood === 'B') echo "selected"; ?>>B</option>
                    <option value="AB" <?php if ($Blood === 'AB') echo "selected"; ?>>AB</option>
                    <option value="O" <?php if ($Blood === 'O') echo "selected"; ?>>O</option>
                    <option value="A+" <?php if ($Blood === 'A+') echo "selected"; ?>>A+</option>
                    <option value="B+" <?php if ($Blood === 'B+') echo "selected"; ?>>B+</option>
                </select>
            </div>
            <div>
                <label for="eye">Eye result</label>
                <select name="eye" id="eye">
                    <option value="full" <?php if ($Eye === 'full') echo "selected"; ?>>Full</option>
                    <option value="semi" <?php if ($Eye === 'semi') echo "selected"; ?>>Semi</option>
                    <option value="null" <?php if ($Eye === 'blind') echo "selected"; ?>>Blind</option>
                </select>
            </div>
            <div>
                <label for="ghr">General Health Result</label>
                <select name="ghr" id="ghr">
                    <option value="Excellent" <?php if ($GHR === 'Excellent') echo "selected"; ?>>Excellent</option>
                    <option value="Very_good" <?php if ($GHR === 'Very_good') echo "selected"; ?>>Very Good</option>
                    <option value="bad" <?php if ($GHR === 'bad') echo "selected"; ?>>Bad</option>
                </select>
            </div>
        </div>

        <input class="stu" type="submit" name="updatedid1" value="UpDate">
    </form>
    <?php
    if (isset($_POST['updatedid1'])) {
        $Dl = $_POST['Dl'];
        $Year = $_POST['year'];
        $Blood = $_POST['Blood'];
        $Eye = $_POST['eye'];
        $GHR = $_POST['ghr'];

        $updateQuery = "UPDATE health SET Dl='$Dl', year='$Year', blood='$Blood', eye='$Eye', ghr='$GHR' WHERE id='$id'";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            echo "Updated successfully!";
            header("location: display_health.php");
            exit;
        } else {
            echo "Failed to update the record: " . mysqli_error($conn);
        }
    }
   
    ?>

    <footer></footer>
</body>

</html>
