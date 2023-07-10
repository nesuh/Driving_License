<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set status page</title>
    <link rel="stylesheet" href="style1.css">

</head>
<body>
<?php
include('header.php');
    ?>
    <form action="" method="post">
    <div class="error_container">
            <h3></h3>
          <input type="submit" value="cancel" name="error_cancel" id="errorcancel">
            </div>
    <div class="status_button_container">
        <input type="submit" value="Set status" name="status" class="update_button">
    </div>  
    </form>
    <?php
    include_once('db_conn.php');
if(isset($_REQUEST['status'])){
    $query="select User_id,User_status from User";
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
            <tr><th>User_password</th><th>User_status</th><th>update Status</th></tr>
            <form action='Set_status.php' method=post>
        <?php
        ");
        while($row=mysqli_fetch_assoc($view_result)){
            echo ("
            ?>
            <tr><td>".$row['User_id']."</td>
           
            <td>".$row['User_status']."</td>
            <td><button><a href='updatestatus.php?id=".$row['User_id']."'>update</a></button><td</td>
            </tr>
            <?php
               ");

        }
        echo '
        ?>
        </table>
        <input type=submit name=view_cancel value=cancel id=viewcancel>
        </form>
        </div>
        <?php
           ';  

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