<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login page</title>
</head>

<body>
    <img class="aa" src="images/test1.jpg" alt="">
    <header class="heading">
        <div class="logo">
            <img src="images/Emblem_of_Ethiopia.svg.png" alt="image">

            <h4 class="green"> Welcome to Ethiopian </h4>
            <h4 class="yellow"> Driving License information</h4>
            <h4 class="red"> Management System</h4>
        </div>
        </header>
        <!-- <nav class="navbar">
            <a href="login.php">login</a>
            <a href="homepage.php">help</a>
             <a href="#about">About us</a> 
             <a href="#contact">Contact us</a> 
            <a class="out" href="logout.php">Logout</a>
        </nav> -->
        <form  class="loge"  action="" method="post">
        <div class="error_container">
            <h3></h3>
          <input type="submit" value="cancel" name="error_cancel" id="errorcancel">
            </div>
            <div>
               <h4> Driving License information
                        Management System </h4>
            </div>
            <div class="lo">
                <input type="text" name="uname" id="uname" placeholder="USER_NAME" required><br>
            </div>
            <div class="lo">
                <input type="text" name="password" id="password" placeholder="PASSWORD" required><br>
            </div>
            <!-- <select name="UserType" id="Types"><br>
<option name="admin" value="Admin">Admin</option>
    <option name="owner"  value="Owner">Owner</option>
    <option name="user" value="User">User</option>
 </select><br> -->
            <!-- <input class="log" type="submit" name="login" value="Login"> -->
<button class="reset" type="submit" name="login">Login</button>
<button  class="reset" type="reset"  name="reset">Reset</button>
            </form>
       <?php
        
        if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $password=$_POST['password'];
        //$user_type=$_POST['UserType'];
        // $sql="INSERT INTO users(user_name,password,user_type)values('$uname','$password','$user_type')";
        $sql="SELECT *FROM user WHERE User_name='".$uname."' AND User_password='".$password."' ";
        
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        if($row['User_type']=='Admin'){
            header("Location:home.php");
            $_SESSION['password']=$password;
        }
        else if($row['User_type']=='Owner' && $row['User_status']=='ACTIVE'){
            header("Location:issueL.php");
            $_SESSION['password']=$password;
        }
        else if($row['User_type']=='User' && $row['User_status']=='ACTIVE'){
            header("Location: register.php");
            $_SESSION['password']=$password;
        }else{
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
        ?>

        <footer>
            <div class="copyright">
                <p>Copyright &copy; All right is reserved to Company name</p>
            </div>
        </footer>
</body>

</html>