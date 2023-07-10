<?php
require "db_conn.php";
?>
<?php
session_start();
if(isset($_SESSION['password'])){
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
        <button><a href="Practical.php">Add student</a></button>
    </div>
    <table>
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Driving Licence No</th>
                <th>Year_Number</th>
                <th>Middle_Name</th>
                <th>Practical Result</th>
            </tr> 
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM presult";
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $Dl = $row['Dl'];
                $Year = $row['year'];
                $presult = $row['presult'];
                
                echo '
                <tr>
    
                    <td>'.$Dl.'</td>
                    <td>'.$Year.'</td>
                    <td>'.$presult.'</td>
                    <td>
                        <button><a href="updateP.php?updatedid2='.$Dl.'">Update</a></button>
                        <button name="delete"><a href="delete.php?deleteid2='.$id.'">Delete</a></button>
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
