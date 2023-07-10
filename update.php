<?php
include('db_conn.php');
 if(isset($_POST["id"])){
 $q="DELETE FROM`users` WHERE User_password='$id'";
 $qresult=mysqli_query($conn,$q);
 header('location:update.php');
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php
include('header.php');
    ?>
    <form action="" method="post">
    <div class="update_button_container">
        <input type="submit" value="update Users" name="update" class="update_button">
    </div>
    </form>
    <?php
include_once('db_conn.php');
if(isset($_REQUEST['update'])){
    $query="select * from User";
    $view_result=mysqli_query($conn,$query);
    if($view_result){
        ?>
         <script>
            let button=document.querySelector('.update_button');
            button.style.display="none";
         </script>
        <?php
        echo ("
        ?>
        <div class=table_container>
        <table border=1px width=1300>
            <tr><th>User_id</th><th>User_name</th><th>User_type</th><th>User_status</th><th>User_passaword</th><th>delete</th><th>update</th></tr>
        <?php
        ");
        while($row=mysqli_fetch_assoc($view_result)){
            echo ("
            ?>
            <tr><td>".$row['User_id']."</td>
            <td>".$row['User_name']."</td>
            <td>".$row['User_type']."</td>
            <td>".$row['User_status']."</td>
            <td>".$row['User_password']."</td>
            <td><button id=table_buttons><a href='Adelete.php?id=".$row['User_id']."'>delete</a></button><td</td>
            <td><button><a href='updatetable.php?id=".$row['User_id']."'>update</a></button><td</td>
            </tr>
            <?php
               ");

        }
        echo ("
        ?>
        </table>
        <form action='' method=post>
        <input type=submit name=view_cancel value=cancel id=viewcancel>
        </form>
        </div>
        <?php
           ");  

    }
    else{
        echo "There is some error on the process!";
    }
}
if(isset($_REQUEST['view_cancel'])){
    ?>
<script>
   let button=document.querySelector('.update_button');
   let divbutton=document.querySelector('.table_container');
            divbutton.style.display="none";
            button.style.display="block";   
</script>
    <?php
      
}
?>
</body>
</html>