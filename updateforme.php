include('header.php');
<?php
session_start();
if(isset($_SESSION['password'])){
    // include("db_conn.php");
require 'db_conn.php';
if (isset($_GET['updatedid'])) {
    $id = $_GET['updatedid'];
    
    // Ensure $id is a valid integer value
    if (is_numeric($id)) {
        $update = "SELECT * FROM register WHERE Dl=$id";
        $result = mysqli_query($conn, $update);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Rest of your code to retrieve data and display the form
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$gender=$row['gender'];
$birth_date=$row['birth_date'];
$zone=$row['zone'];
$worda=$row['worda'];
$kabala=$row['kabala'];
$phone=$row['phone'];
// $id=$row['id'];
$Dl=$row['Dl'];
echo "<form  class=reg action=''  method=post enctype=multipart/form-data> 
<div class=Bform>  
<div class=Bfrom1>
<div class=lo>
    <label for=fname>First Name</label>
    <input type=text name=fname id=fname value=<?php echo $mname; ?>>
</div>
<div class=lo>
    <label for=mname>Middle Name</label>
    <input type=text name=mname id=mname  value=<?php echo $mname; ?>>
</div>
<div class=lo>
    <label for=lname>Last Name</label>
    <input type=text name=lname id=lname  value=<?php echo $lname; ?>>
</div>
<div class=lg>
    <label>Gender:</label>
  Female:<input class=r type=radio name=gender 
<?php if (isset($gender) && $gender==female) echo checked;?>
  value=female>
  Male:<input class=r type=radio name=gender 
  <?php if (isset($gender) && $gender==male) echo checked;?>
  value=male>
</div>
<input type=submit name=updatedidl class=stu value=UpDate>
</form>";
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

<?php
if(isset($_POST['updatedidl'])){  
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
if ($_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
    // A new image file has been uploaded
    $newFilename = $_FILES['newImage']['name'];
    $newTempname = $_FILES['newImage']['tmp_name'];
    $newFolder = "./image/" . $newFilename;
    
    if($_FILES['newImage']['error'] === UPLOAD_ERR_NO_FILE){  
        $create="update  register set Dl='$Dl', fname='$fname',mname='$mname', lname='$lname', gender='$gender', birth_date=$birth_date,
         zone='$zone', worda='$worda',kabala=$kabala,phone=$phone,image='$filename' where id=$id";
         $result=mysqli_query($conn,$create);
        if($result){
            echo"updated sussfully!";
            // header("location:display_register.php");
        }else{
            die("failed!".mysqli_connect_error());
           
        }
        }else{
            echo "Image upload failed" .$_FILES['newImage']['error'];
        }
    // Move the new image file to the specified folder
    if (move_uploaded_file($newTempname, $newFolder)) {
        // Update the image field in the database with the new filename
        $updateQuery = "UPDATE register SET image = '$newFilename' WHERE Dl=$id";
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

// $filename=$_FILES["image"]["name"];
// $tempname=$_FILES["image"]["tmp_name"];
// $folder="./image/" . $filename;
// if (!is_dir($folder)) {
//     mkdir($folder, 0777, true);
//  }
 // Set the target path for the uploaded image
 //$targetPath = $folder . $filename;
  }
?>
<footer></footer>
<?php
}
else{
    header('location:login.php');
}
?>
</body>
</html>






