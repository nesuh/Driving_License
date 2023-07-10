<?php
session_start();
if(isset($_SESSION['password'])){
    require 'db_conn.php';
if (isset($_GET['updatedid2'])) {
    $id = $_GET['updatedid2'];
    
    // Ensure $id is a valid integer value
    if (is_numeric($id)) {
        $update = "SELECT Dl,year,presult FROM Presult WHERE Dl=$id";
        $result = mysqli_query($conn, $update);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Rest of your code to retrieve data and display the form
            // $id=$row['id'];
            $Dl=$row['Dl'];
            $Year=$row['year'];
            $presult=$row['presult'];
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
    <title>Practical Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="Rnavbar">
    <a href="register.php"> Personal</a>
    <a href="Health.php">Health Status</a>
    <a href="Practical.php">Practical Result</a>
    <a href="theory.php">theory Result</a>
</nav>
</header> 
    <form action="" method="post">
        <div class="Bform2">
    <div class="lo">
        <label for="Dl">Driving License Number</label>
        <input type="number" name="Dl" id="Dl" value="<?php echo $Dl ; ?>">
    </div>
    <div class="lo">
        <label for="year">Year</label>
        <input type="number"  max="3000" min="1900"  name="year" id="year" value="<?php echo $Year; ?>">
    </div>
    <div class="lo">
        <label for="presult"> Practical Result</label>
        <input type="number" max="50" name="presult" id="presult" value="<?php echo $presult; ?>">
    </div>
    </div>
    <!-- stu-student register -->
    <input class="stu" type="submit" name="updatedid2" value="Register"> 
    </form>
    <?php
if(isset($_POST['updatedid2'])){
    $Dl=$_POST['Dl'];
    $Year=$_POST['year'];
    $presult=$_POST['presult'];
    $update="update Presult set year=$Year,presult=$presult where Dl=$id";
$result=mysqli_query($conn,$update);
//$row=mysqli_fetch_assoc($result);
if($result){
    echo"update sucussdully bro!";

    header('location:display_practical');
}else{
    die("update error ".mysqli_connect_error());
}
}

}
else{
    header('location:login.php');
}

?>
</body>
</html>