<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="error_container">
            <h3></h3>
          <input type="submit" value="cancel" name="error_cancel" id="errorcancel">
            </div>
<?php
include('db_conn.php');
 if(isset($_REQUEST["id"])){
    $id=$_REQUEST['id'];
 $q="DELETE FROM user WHERE User_id='$id'";
 $qresult=mysqli_query($conn,$q);
 if($qresult){
 ?>
 <script> 
              var errordiv = document.querySelector('.error_container');
                let h3=errordiv.querySelector('h3');
                h3.style.color="red";
                h3.textContent="YOU DELETE THE USER CORRECTLY!";
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
</body>
</html>