<?php
session_start();
if(isset($_SESSION['password'])){
require "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display Register</title>
    <link rel="stylesheet" href="style1.css">
</head>
<div>
    <a  class="other" href="register.php">Add student</a>
</div>
<div class="table">
<table>
    <thead>
<tr>
    <!-- <th>No</th> -->
    <th>Driving Licence No</th>
    <th>First_Name</th>
    <th>Middle_Name</th>
    <th>Last_Name</th>
    <th>Gender</th>
    <th>Birth_Date</th>
    <th>Zone</th>
    <th>worda</th>
    <th>kabala</th>
    <th>Phone_Number</th>
    <th >Edit</th>
   </tr> 
   </thead>
<?php
$sql="SELECT *FROM register";
$result=mysqli_query($conn,$sql);
if($result){
while($row=mysqli_fetch_assoc($result)){
// $Dl=$_POST['Dl'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$gender=$row['gender'];
$birth_date=$row['birth_date'];
$zone=$row['zone'];
$worda=$row['worda'];
$kabala=$row['kabala'];
$phone=$row['phone'];
$Dl=$row['Dl'];
$filename=$row['image'];


echo '
<tr>
<td>'.$Dl.'</td>
<td>'.$fname.'</td>
<td>'.$mname.'</td>
<td>'.$lname.'</td>
<td>'.$gender.'</td>
<td>'.$birth_date.'</td>
<td>'.$zone.'</td>
<td>'.$worda.'</td>
<td>'.$kabala.'</td>
<td>'.$phone.'</td>
<td>
<button class="TB" name="delete"><a href="delete.php?deleteid='.$Dl.'">Delete</a></button>
<button class="TB" name="update"><a href="UpdateReg.php?updatedid='.$Dl.'">Update</a></button>
</td>
</tr>';
}
}
// <td>'.$filename.'</td>
// <td>'.$id.'</td>

?>


 
   </table>
   <?php
}
else{
    header('location:login.php');
}
?>
   </div>
</body>
</html>