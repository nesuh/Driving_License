<?php
session_start();
if (isset($_SESSION['password'])) {
    require "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Register</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div>
    <button><a href="register.php">Add student</a></button>
</div>
<?php
    $sql = "SELECT * FROM health";
    $result = mysqli_query($conn, $sql);
    if ($result) {
?>
<table border="1">
<tr>
    <th>Driving License No</th>
    <th>Year</th>
    <th>Blood Type</th>
    <th>Eye Result</th>
    <th>General Health Result</th>
</tr> 
<?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $Dl = $row['Dl'];
            $Year = $row['year'];
            $Blood = $row['blood'];
            $Eye = $row['eye'];
            $GHR = $row['ghr'];
            echo ' 
            <tr>
                <td>'.$Dl.'</td>
                <td>'.$Year.'</td>
                <td>'.$Blood.'</td>
                <td>'.$Eye.'</td>
                <td>'.$GHR.'</td>
                <td>
                    <button><a href="update_H.php?updatedid1='.$id.'">Update</a></button>
                    <button><a href="delete.php?deleteid1='.$id.'">Delete</a></button>
                </td>
            </tr>';
        }
?>
</table>
<?php
    } else {
        echo "Error executing SQL query: " . mysqli_error($conn);
    }
    mysqli_close($conn); // Close the database connection
} else {
    header('location: login.php');
}
?>
</body>
</html>
