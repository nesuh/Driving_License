<?php
session_start();
// if(isset($_SESSION['passwrd'])){ 
require 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="Rnavbar">
            <a href="register.php">Personal</a>
            <a href="Health.php">Health Status</a>
            <a href="Practical.php">Practical Result</a>
            <a href="theory.php">Theory Result</a>
        </nav>
    </header> 

    <form class="H" action="" method="post">
        <div class="Bform2">
            <div class="lo p">
                <label for="Dl">Driving License Number</label>
                <input type="number" name="Dl" id="Dl" required>
            </div>
            <div class="lo p">
                <label for="year">Year</label>
                <input type="number" max="3000" min="1900" name="year" id="year" required>
            </div>
            <div class="lo p">
                <label for="presult">Practical Result</label>
                <input type="number" max="50" name="presult" id="presult" required>
            </div>
            <br><br>
            <input class="stu" type="submit" name="resultP" value="Register"> 
        </div>

    </form>

    <?php
if(isset($_POST['resultP'])){
    $Dl = $_POST['Dl'];
    $Year = $_POST['year'];
    $Presult = $_POST['presult'];

    $query = "INSERT INTO presult (Dl, year, presult) VALUES ('".$Dl."','".$Year."','".$Presult."')";
    $result = mysqli_query($conn, $query);

    if($result){
        header("location: display_practical.php");
    } else {
        die("Insertion failed: " . mysqli_error($conn));
    }
}

?>

</body>
</html>
