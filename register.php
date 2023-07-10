<?php
session_start();
if(isset($_SESSION['password'])){
    require "db_conn.php";
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
    <a href="theory.php">theory Result</a>
    <a href="logout.php">Logout</a>
</nav>
</header>  
<form class="reg" action="" method="post" enctype="multipart/form-data"> 
    <div class="Bform">  
        <div class="Bfrom1">
            <div class="lo">
                <input type="text" name="fname" id="fname" placeholder="First Name" required>
            </div>
            <div class="lo">
                <input type="text" name="mname" id="mname" placeholder="Middle Name" required>
            </div>
            <div class="lo">
                <input type="text" name="lname" id="lname"  placeholder="Last Name" required>
            </div>
            <div class="lg G">
                <label>Gender:</label>
                Female:<input class="r" type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">
                Male:<input class="r" type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">
            </div>
            <div class="lg">
                <label for="fname">BirthDate</label>
                <input type="date" name="BirthDate" placeholder="BirthDate" required>
            </div>
        </div>
        <div class="Bform2"> 
            <div class="lo">
                <input type="text" name="zone" id="zone" placeholder="Zone" required>
            </div>
            <div class="lo">
                <input type="text" name="worda" id="worda" placeholder="woreda"  required>
            </div>
            <div class="lo">
                <input type="number" max="20" name="kabala" id="kabala"  placeholder="Kebele"  required>
            </div>
            <div class="lo">
                <input type="number" name="phone" id="phone"  placeholder="Phone number"  required>
            </div>
            <div class="lo">
                <input type="number" name="Dl" id="Dl"  placeholder="Driving License Number"  required>
            </div>
            <div class="lg">
                <label for="img">Image</label>
                <input type="file" name="image" id="image" required>
            </div>
        </div>
    </div>
    <input class="reset R" type="submit" name="Register" value="Register">
    <a href="displyay_register.php">See_Student</a>
</form>

<?php
if(isset($_POST['Register'])){  
    $Dl=$_POST['Dl'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $birth_date=$_POST['BirthDate'];
    $zone=$_POST['zone'];
    $worda=$_POST['worda'];
    $kabala=$_POST['kabala'];
    $phone=$_POST['phone'];
    // $folder="C:\wamp64\www\DLIMS\image";
    $filename=$_FILES["image"]["name"];
    $tempname=$_FILES["image"]["tmp_name"];
    $targetPath = "uploads/".$filename;

    if(move_uploaded_file($tempname, $targetPath )) {  
        $create = "INSERT INTO register(Dl, fname, mname, lname, gender, birth_date, zone, worda, kabala, phone, image) VALUES ('".$Dl."','".$fname."','".$mname."','".$lname."','".$gender."','".$birth_date."','".$zone."','".$worda."','".$kabala."','".$phone."','". $targetPath."')";
        $result = mysqli_query($conn,$create);
        if($result){
            header('location:displyay_register.php');
        }else {
            die("Failed!" . mysqli_connect_error());
        }
    } else {
        echo "Image upload failed: " . $_FILES['image']['error'];
    }
}
}
else{
    header('location:login.php');
}
?>

<footer></footer>
</body>
</html>
