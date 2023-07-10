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
    <a href="logout.php">LogOut</a>
</nav>
</header> 
    <form class="H" method="post">
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
        <label for="tresult"> Theory Result</label>
        <input type="number" max="50" name="Tresult" id="tresult" required>
    </div>
    <br><br>
    <input  class="stu"  type="submit" name="resultT" value="Register"> 
    <!-- <a href="updateT.php">Update</a> -->
    </div>
   
    </form>
    <?php
if(isset($_POST['resultT'])){
    $Dl=$_POST['Dl'];
    $Year=$_POST['year'];
    $Tresult=$_POST['Tresult'];
$query1="SELECT Presult FROM Presult WHERE Dl=$Dl";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_assoc($result1);
$id1=$row['Presult'];
if($id1>25 && !empty($id1)){
    $query="INSERT INTO   tresult(Dl,year,tresult)VALUES('".$Dl."','".$Year."','".$Tresult."')";
    $result=mysqli_query($conn,$query);
    if($result){
        header("Location: display-theory.php");
    }else{
        die("query error is happen".mysqli_connect_error());
    }
    if(!$conn){
       die("connection failed bro!".mysqli_connect_error()); 
    }else{
echo"bro connection sussfully!";
    }
}
else{
    die("your practical result is falied!");
}
   
    // if(mysqli_num_rows($result)>0){
    
    //     if( $row=mysqli_fetch_assoc($result)){
    
    //     }

    // }
   
   
}
}
else{
    header('location:login.php');
}
?>
</body>
</html>