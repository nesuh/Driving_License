<?php
require 'db_conn.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
$sql="delete from register where Dl='$id'";
$result=mysqli_query($conn,$sql);
if($result){
header("location:displyay_register.php");
}
}else if(isset($_GET['deleteid1'])){
    $id=$_GET['deleteid1'];
    $sql2="delete from health where id=$id";
    $result2=mysqli_query($conn,$sql2);
    if($result2){
        header("location:display_health.php");  
    } 
}else if(isset($_GET['deleteid2'])){
$id=$_GET['deleteid2'];
$sql3="delete from Presult where id=$id";
$result3=mysqli_query($conn,$sql3);
if($result3){
header("location:display_practical.php");
}
}else if(isset($_GET['deleteid3'])){
    $id=$_GET['deleteid3'];
    $sql4="delete from tresult where id=$id";
    $result4=mysqli_query($conn,$sql4);
    if($result4){
        header("Location: display-theory.php");
}
}else{
    echo("erroe!".mysqli_error($conn));
}





?>