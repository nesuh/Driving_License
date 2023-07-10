<?php
session_start();
if (isset($_SESSION['password'])) {
    require 'db_conn.php';
    if (isset($_GET['updatedid'])) {
        $id = $_GET['updatedid'];

        // Ensure $id is a valid integer value
        if (is_numeric($id)) {
            $update = "SELECT * FROM register WHERE Dl='$id'";
            $result = mysqli_query($conn, $update);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Rest of your code to retrieve data and display the form
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                $gender = $row['gender'];
                $birth_date = $row['birth_date'];
                $zone = $row['zone'];
                $worda = $row['worda'];
                $kabala = $row['kabala'];
                $phone = $row['phone'];
                $Dl = $row['Dl'];
            } else {
                echo "No record found with the provided id.";
            }
        } else {
            echo "Invalid id value.";
        }
    } else {
        echo "No id parameter provided in the URL.";
    }
} else {
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
    <title>Register Driver Personal Information</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="Rnavbar">
            <a href="register.php"> Personal</a>
            <a href="Health.php">Health Status</a>
            <a href="Practical.php">Practical Result</a>
            <a href="theory.php">Theory Result</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <form class="reg" action="" method="post" enctype="multipart/form-data">
        <div class="Bform">
            <div class="Bfrom1">
                <div class="lo">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" value="<?php echo $fname ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="mname">Middle Name</label>
                    <input type="text" name="mname" id="mname" value="<?php echo $mname ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" value="<?php echo $lname ?? ''; ?>">
                </div>
                <div class="lg">
                    <label>Gender:</label>
                    Female:<input class="r" type="radio" name="gender" <?php if ($gender === 'Female') echo "checked"; ?> value="Female">
                    Male:<input class="r" type="radio" name="gender" <?php if ($gender === 'Male') echo "checked"; ?> value="Male">
                </div>
                <div class="lo">
                    <label for="fname">BirthDate</label>
                    <input type="date" name="BirthDate" value="<?php echo $birth_date ?? ''; ?>">
                </div>
            </div>
            <div class="Bform2">
                <div class="lo">
                    <label for="zone">Zone</label>
                    <input type="text" name="zone" id="zone" value="<?php echo $zone ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="worda">Worda</label>
                    <input type="text" name="worda" id="worda" value="<?php echo $worda ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="kabala">Kebala</label>
                    <input type="number" max="20" name="kabala" id="kabala" value="<?php echo $kabala ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="phone">Phone number</label>
                    <input type="number" name="phone" id="phone" value="<?php echo $phone ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="Dl">Driving License Number</label>
                    <input type="number" name="Dl" id="Dl" value="<?php echo $Dl ?? ''; ?>">
                </div>
                <div class="lo">
                    <label for="img">Image</label>
                    <input type="file" name="newImage" id="image">
                    <?php if (!empty($row['image'])) { ?>
                        <img src="uploads/<?php echo $row['image']; ?>" alt="Image Preview" width="100" height="100">
                    <?php } ?>
                </div>
            </div>
        </div>
        <input type="submit" name="updatedid" class="stu" value="Update">
    </form>

    <?php
    if (isset($_POST['updatedid'])) {
        $Dl = $_POST['Dl'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birth_date = $_POST['BirthDate'];
        $zone = $_POST['zone'];
        $worda = $_POST['worda'];
        $kabala = $_POST['kabala'];
        $phone = $_POST['phone'];

        if ($_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
            // A new image file has been uploaded
            $newFilename = $_FILES['newImage']['name'];
            $newTempname = $_FILES['newImage']['tmp_name'];
            $newFolder = "uploads/".$newFilename;

            if (move_uploaded_file($newTempname, $newFolder)) {
                // Update the image field in the database with the new filename
                $updateQuery = "UPDATE register SET image = '$newFilename' WHERE Dl='$id'";
                $result = mysqli_query($conn, $updateQuery);

                if ($result) {
                    echo "Image updated successfully!";
                } else {
                    echo "Failed to update the image.";
                }
            } else {
                echo "Failed to upload the new image file.";
            }
        }

        $updateQuery = "UPDATE register SET Dl='$Dl', fname='$fname', mname='$mname', lname='$lname', gender='$gender', birth_date='$birth_date', zone='$zone', worda='$worda', kabala='$kabala', phone='$phone'WHERE Dl='$id'";
        $result = mysqli_query($conn, $updateQuery);

        if ($result) {
            echo "Updated successfully!";
            header("location: displyay_register.php");
            exit;
        } else {
            echo "Failed to update the record: " . mysqli_error($conn);
        }
    }
    ?>

    <footer></footer>
</body>

</html>
