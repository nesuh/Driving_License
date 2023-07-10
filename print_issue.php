<?php
session_start();

// Include the database connection file
require 'db_conn.php';

// Retrieve the parameters from the URL
$dl_number = $_GET['Dl'];
$start_date = $_GET['sd'];
$end_date = $_GET['ed'];

// SQL queries to fetch data from the 'register' and 'health' tables
$register_query = "SELECT `Dl`, `fname`, `mname`, `lname`, `gender`, `birth_date`, `zone`, `worda`, `kabala`, `phone`, `image`
                   FROM `register`
                   WHERE `Dl` = '$dl_number'";

$health_query = "SELECT `Dl`, `year`, `blood`, `eye`, `ghr`
                 FROM `health`
                 WHERE `Dl` = '$dl_number'";
    // echo "<h2>Driving License Details:</h2>";
    // echo "<p>Driving License Number: " . $register_row['Dl'] . "</p>";
    // echo "<p>Full Name: " . $register_row['fname'] . " " . $register_row['lname'] . "</p>";
    // echo "<p>Gender: " . $register_row['gender'] . "</p>";
    // echo "<p>Birth Date: " . $register_row['birth_date'] . "</p>";
    // echo "<p>Zone: " . $register_row['zone'] . "</p>";
    // echo "<p>Worda: " . $register_row['worda'] . "</p>";
    // echo "<p>Kabala: " . $register_row['kabala'] . "</p>";
    // echo "<p>Phone: " . $register_row['phone'] . "</p>";
    // echo "<p>Health Details:</p>";
    // echo "<p>Year: " . $health_row['year'] . "</p>";
    // echo "<p>Blood Group: " . $health_row['blood'] . "</p>";
    // echo "<p>Eye Color: " . $health_row['eye'] . "</p>";
    // echo "<p>General Health Remarks: " . $health_row['ghr'] . "</p>";
    // echo "<img src='" . $register_row['image'] . "' alt='Driving License Photo' style='max-width: 200px;'>";
    // echo "<h2>Issue Details:</h2>";
    // echo "<p>Start Date: " . $start_date . "</p>";
    // echo "<p>End Date: " . $end_date . "</p>";
// Execute the queries and fetch the results
$register_result = mysqli_query($conn, $register_query);
$health_result = mysqli_query($conn, $health_query);

// Check if data is found for the given ID
if (mysqli_num_rows($register_result) > 0 && mysqli_num_rows($health_result) > 0) {
    // Fetch the data
    $register_row = mysqli_fetch_assoc($register_result);
    $health_row = mysqli_fetch_assoc($health_result);

    // // Output the printable data

}
?>

<!-- PHP code to retrieve data and output HTML -->

<!-- HTML section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="C1">
    <div id="printable-data" class="printable-data"   >
        <!-- Place the printable data here -->
       
        <!-- <p>Driving License Number: <php echo $register_row['Dl']; ?></p>
        <p>Full Name:  <php echo $register_row['fname']  . " " . $register_row['lname'] ?> "</p>
        <p>Gender:  <php echo $register_row['gender']  ?></p>
        <p>Birth Date: <php echo $register_row['birth_date'] ?></p>
        <p>Zone: <php echo $register_row['zone'] ?></p>
        <p>Worda: <php echo $register_row['worda'] ?></p>
        <p>Kabala: <php echo $register_row['kabala'] ?></p>
        <p>Phone: <php echo $register_row['phone'] ?></p>
        <p>Year: <php echo $health_row['year'] ?></p> -->
        <!-- <p>Blood Group: <php echo $health_row['blood'] ?></p> -->
        <!-- <p>Eye Color: <php echo $health_row['eye'] ?></p> -->
        <!-- <p>General Health Remarks: <php echo $health_row['ghr'] ?></p> -->
<!--      
        <p>Start Date: <php echo $start_date ?></p>
        <p>End Date: <php echo  $end_date ?></p> -->
        <table  style="padding: 4rem;">
<th>
<header class="heading" style="margin-right:10rem;">
        <div class="logo">
            <img src="images/Emblem_of_Ethiopia.svg.png" alt="image">
            <h4 class="green">Ethiopian Fediral  Driving</h4>
            <h4 class="red"> Licensing Controul Authority</h4>
        </div>
        </header>
        <td><img src="uploads/<?php echo $register_row['image']; ?>" alt="Image Preview" width="100" height="100"></td>
</th> 
<tr>
<td><p>Driving License Number: <?php echo $register_row['Dl']; ?></p> </td>
<td><p>Full Name:  <?php echo $register_row['fname']  . " " . $register_row['lname'] ?></p></td>
</tr>
<tr>
    <td>
    <p>Gender:  <?php echo $register_row['gender']  ?></p></td>
   <td><p>Birth Date: <?php echo $register_row['birth_date'] ?></p></td> 
    
</tr>
<tr>
    <td>
<p>Worda: <?php echo $register_row['worda'] ?></p> </td>
<td><p>Kabala: <?php echo $register_row['kabala'] ?></p></td>
</tr>
<tr>
    <td>
    <p>Phone: <?php echo $register_row['phone'] ?></p></td>
      <td><p>Year: <?php echo $health_row['year'] ?></p>  </td>  
</tr>   
<tr>
    <td> <p>Start Date: <?php echo $start_date ?></p>   
    <td><p>End Date: <?php echo  $end_date ?></p></td></td>
</tr>  
         
        </table>
    
        <!-- Rest of the data... -->
   

    <button class="print" onclick="printForm()">Print</button>
      <script language="JavaScript" type="text/javascript">
    function printForm() {
        var printdata = document.getElementById("printable-data").innerHTML;
        var newwin = window.open("", "_blank");
        newwin.document.write("<html><head><title>Print Form Page</title></head><body>" + printdata + "</body></html>");
        newwin.document.close();
        newwin.print();
        newwin.close();
    }

    // Rest of the code...
</script>
</body>
</html>