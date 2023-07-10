<?php
session_start();
if(isset($_SESSION['password'])){
  require 'db_conn.php'  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create account page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php
    include('header.php'); 
    ?>
    <!-- This is all about create account forms -->
    <div class="account_container">
        <form action="" method="post" enctype="multipart/form-data" onclick="validatePassword();">
            <div class="error_container">
            <h3></h3>
          <input type="submit" value="cancel" name="error_cancel" id="errorcancel">
            </div>
            <div class="username_container">
                <div class="userpassword_container">
                    <label for="userid_field">User_Id</label>
                    <input type="text" name="userid" id="userid_field" required>
                </div>
                <label for="username_field">User Name</label>
                <input type="text" name="username" id="username_field" required pattern="[A-Za-z]+">
            </div>
            <div class="userpassword_container">
                <label for="userpassword_field">Password</label>
                <input type="password" name="userpassword" id="userpassword_field" required>
            </div>
            <div class="usertype_container">
                <label for="usertype_field">User Type</label>
                <input type="text" name="usertype" id="usertype_field" required pattern="[A-Za-z]+">
            </div>
            <div class="userstatus_container">
                <label for="userstatus_field">User Status</label>
                <select name="userstatus" id="userstatus_field" class="combo">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="BLOCK">BLOCK</option>
                </select>
               
            </div>
            <div class="userregister_container">
                <input type="submit" value="Register" name="register_user" id="user_register">
            </div>
        </form>
    </div>

    <?php
    // $error="";
    // $happy="";
    // This is creating a connection with the database.
    include_once("db_conn.php");
    if (isset($_REQUEST["register_user"])) {
        $userid = $_REQUEST["userid"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["userpassword"];
        $usertype = $_REQUEST['usertype'];
        $status = $_REQUEST['userstatus'];
        $sqlcommand = "select * from user where User_Id='" . $userid . "'";
        $result = mysqli_query($conn, $sqlcommand);
        if (mysqli_num_rows($result) == 0) {
            $sql = "insert into user(User_Id,User_name,User_type,User_status,User_password) values('$userid','$username','$usertype','$status','$password')";
            $result2 = mysqli_query($conn, $sql);
            if ($result2) {
                ?>
                <script>
                    var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.style.color="green";
                h3.textContent="YOU REGISTER THE USER CORRECTLY!";
                    errordiv.style.display = "block";
                    var cancelbutton = document.querySelector("#errorcancel");
                    function cancel() {
                        var errordiv = document.querySelector('.error_container');
                        errordiv.style.display = "none";
                    }
                    cancelbutton.addEventListener('click', cancel);

                   
                </script>
                <?php
            } else {
                ?>
                <script>
                       var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.style.margin-top="0";
                h3.textContent="THE USER IS NOT REGISTERED, THERE IS SOME ERROR. TRY AGAIN.";
                    errordiv.style.display = "block";
                    var cancelbutton = document.querySelector("#errorcancel");
                    function cancel() {
                        var errordiv = document.querySelector('.error_container');
                        errordiv.style.display = "none";
                    }
                    cancelbutton.addEventListener('click', cancel);
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                    var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.textContent="THE USER IS NOT REGISTERED, THERE IS SOME ERROR. TRY AGAIN.";
                    errordiv.style.display = "block";
                    var cancelbutton = document.querySelector("#errorcancel");
                    function cancel() {
                        var errordiv = document.querySelector('.error_container');
                        errordiv.style.display = "none";
                    }
                    cancelbutton.addEventListener('click', cancel);
            </script>
            <?php
        }
    }
}
else{
    header('location:login.php');
}
    ?>
    <script src="script.js"></script>
</body>
</html>
