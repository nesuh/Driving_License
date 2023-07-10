
<?php
$server_name='localhost';
$user_name='root';
$password='anta13@j';
$db_name='dlims';
$conn=mysqli_connect($server_name,$user_name,$password,$db_name);
if(!$conn){
 die("connection failed!".mysqli_connect_error());
}else{
    //echo"connection sussfull!";
}
?>