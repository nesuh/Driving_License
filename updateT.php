<?php
session_start();
if(isset($_SESSION['password'])){
require "db_conn.php";
if(isset($_GET['updatedid3'])){
    $id=$_GET['updatedid3'];
    // this numeric id is one of the primary key autoincriment value for delete update use
    if(is_numeric($id)){
        $sq="SELECT * FROM tresult where id=$id";
        $result=mysqli_query($conn,$sq);
    //    if($result && mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $Dl=$row['Dl'];
        $Year=$row['year'];
        $Tresult=$row['tresult'];
    //    }else{
    //    echo" No record found with the provided id.";
    // //    echo statement is used to display the condition error
    //    }
    }else{
        echo "Invalid id value.";
    }
   
}else{
    echo "No id parameter provided in the URL.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theory Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="Rnavbar">
    <a href="register.php"> Personal</a>
    <a href="Health.php">Health Status</a>
    <a href="Practical.php">Practical Result</a>
    <a href="theory.php">theory Result</a>
    <a href="logout"></a>
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
        <input type="number" max="3000" min="1900" name="year" id="year" value="<?php echo $Year;?>">
    </div>
    <div class="lo">
        <label for="tresult"> Theory Result</label>
        <input type="number" max="50" name="Tresult" id="tresult" value="<?php echo $Tresult; ?>">
    </div>
    </div>
    <input  class="stu"  type="submit" name="updatedid3" value="Register"> 
    </form>
    <?php
if(isset($_POST['updatedid3'])){
    $Dl=$_POST['Dl'];
    $Year=$_POST['year'];
    $Tresult=$_POST['Tresult'];
    $query="update  tresult set year=$Year,tresult=$Tresult where id=$id";
    $result=mysqli_query($conn,$query);
   if($result){
    header("Location:display-theory.php");
   }else{
    echo"update error!";
   }
    if(!$conn){
       die("connection failed bro!".mysqli_connect_error()); 
    }else{
echo"bro connection sussfully!";
    }
   
}
}
else{
    header('location:login.php');
}
?>
</body>
</html>