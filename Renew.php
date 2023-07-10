<?php
session_start();

// Include the database connection file
require 'db_conn.php';

// Retrieve the parameters from the URL
?>

<!-- HTML section for renewal print page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="Rnavbar">
            <a href="issueL.php">Issue License</a>
            <a href="Renew.php">Renew License</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <form class="H" method="post" id="myform">
        <div class="Bform2">
        <div class="lo p">
            <label for="Dl">Driving License Number</label>
            <input type="number" name="Dl" id="Dl" required>
        </div>
        <div class="lo p">
            <label for="sd">Start Date</label>
            <input type="date" name="sd" id="sd" required>
        </div>
        <div class="lo p">
            <label for="ed">End Date</label>
            <input type="date" name="ed" id="ed" required>
        </div>
        <input class="reset " type="submit" name="renew" value="Renew">
        </div>
    </form>
    <?php
    if(isset($_REQUEST['renew'])){
        $dl=$_REQUEST['Dl'];
        $start_date=$_REQUEST['sd'];
        $end_date=$_REQUEST['ed'];
// SQL queries to fetch data from the 'register' and 'health' tables
$register_query = "SELECT `Dl`, `fname`, `mname`, `lname`, `gender`, `birth_date`, `zone`, `worda`, `kabala`, `phone`, `image`
                   FROM `register`
                   WHERE `Dl` = '$dl'";

// $health_query = "SELECT `Dl`, `year`, `blood`, `eye`, `ghr`
//                  FROM `health`
//                  WHERE `Dl` = '$dl_number'";

// Execute the queries and fetch the results
$register_result = mysqli_query($conn, $register_query);
// $health_result = mysqli_query($conn, $health_query);

// Check if data is found for the given ID
if (mysqli_num_rows($register_result) > 0) {
    // Fetch the data
    $register_row = mysqli_fetch_assoc($register_result);
    // $health_row = mysqli_fetch_assoc($health_result);

    // Output the printable data for renewal
    echo "<h2>Driving License Renewal Details:</h2>";
    echo "<p>Driving License Number: " . $register_row['Dl'] . "</p>";
    echo "<p>Full Name: " . $register_row['fname'] . " " . $register_row['lname'] . "</p>";
    echo "<p>Gender: " . $register_row['gender'] . "</p>";
    echo "<p>Birth Date: " . $register_row['birth_date'] . "</p>";
    echo "<p>Zone: " . $register_row['zone'] . "</p>";
    echo "<p>Worda: " . $register_row['worda'] . "</p>";
    echo "<p>Kabala: " . $register_row['kabala'] . "</p>";
    echo "<p>Phone: " . $register_row['phone'] . "</p>";
    // echo "<p>Health Details:</p>";
    // echo "<p>Year: " . $health_row['year'] . "</p>";
    // echo "<p>Blood Group: " . $health_row['blood'] . "</p>";
    // echo "<p>Eye Color: " . $health_row['eye'] . "</p>";
    // echo "<p>General Health Remarks: " . $health_row['ghr'] . "</p>";
    echo "<img src='" . $register_row['image'] . "' alt='Driving License Photo' style='max-width: 200px;'>";

    echo "<h2>Renewal Details:</h2>";
    echo "<p>Start Date: " . $start_date . "</p>";
    echo "<p>End Date: " . $end_date . "</p>";
} else {
    echo "<p>No data found for the given ID.</p>";
}
    
?>
    <div id="printable-data">
        <h2>Driving License Renewal Details:</h2>
        <p>Driving License Number: <?php echo $register_row['Dl']; ?></p>
        <p>Full Name: <?php echo $register_row['fname'] . " " . $register_row['lname']; ?></p>
        <p>Gender: <?php echo $register_row['gender']; ?></p>
        <p>Birth Date: <?php echo $register_row['birth_date']; ?></p>
        <p>Zone: <?php echo $register_row['zone']; ?></p>
        <p>Worda: <?php echo $register_row['worda']; ?></p>
        <p>Kabala: <?php echo $register_row['kabala']; ?></p>
        <p>Phone: <?php echo $register_row['phone']; ?></p>
        <!-- <p>Health Details:</p>
        <p>Year: <?php echo $health_row['year']; ?></p>
        <p>Blood Group: <?php echo $health_row['blood']; ?></p>
        <p>Eye Color: <?php echo $health_row['eye']; ?></p>
        <p>General Health Remarks: <?php echo $health_row['ghr']; ?></p>
        <img src="<?php echo $register_row['image']; ?>" alt="Driving License Photo" style="max-width: 200px;">
        <h2>Renewal Details:</h2> -->
        <p>Start Date: <?php echo $start_date; ?></p>
        <p>End Date: <?php echo $end_date; ?></p>
        <!-- <input type="submit" value="print" name="print"> -->
    </div>
    <?php
   
}
?>
    <button onclick="printForm()">Print</button>

    <footer></footer>

    <script language="JavaScript" type="text/javascript">
        function printForm() {
            var printdata = document.getElementById("printable-data").innerHTML;
            var newwin = window.open("", "_blank");
            newwin.document.write(printdata);
            newwin.document.close();
            newwin.print();
            newwin.close();
        }
    </script>
</body>
</html>
