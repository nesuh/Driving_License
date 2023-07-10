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
    <title>Display Practical Result</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div>
        <button><a href="theory.php">Add student</a></button>
    </div>
    <table>
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Driving Licence No</th>
                <th>start_date</th>
                <th>end_date</th>
            </tr> 
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM  issue_table";
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $Dl = $row['Dl'];
                $Year = $row['year'];
                $tresult = $row['tresult'];
                
                echo '
                <tr>
                    <td>'.$Dl.'</td>
                    <td>'.$Year.'</td>
                    <td>'.$tresult.'</td>
                    <td>
                        <button><a href="updateT.php?updatedid3='.$id.'">Update</a></button>
                        <button name="delete"><a href="delete.php?deleteid3='.$id.'">Delete</a></button>
                    </td>
                </tr>';
            }
        }
        ?>
        </tbody>
    </table>
    <?php
}
else{
    header('location:login.php');
}
?>
</body>
</html>
<!-- <td>'.$id.'</td> -->