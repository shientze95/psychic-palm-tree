<html>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table#t01 {
            width: 100%;
            background-color: #f1f1c1;
        }
    </style>
<h1>Admin page of CabsOnline</h1>
<h2>1. Click below button to search for all unssigned booking request with a pick up time within 2 hours.</h2>
<form method="post" action="admin.php">
    <input type="submit" name="All_submit" value="List all">
</from>
</br>
<?php
define('DB_HOST','localhost');
define('DB_NAME','assignment1');
define('DB_USER','root');
define('DB_PASSWORD','');
session_start();
//Create connection
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

if(isset($_POST['All_submit']))
{
    $current_date =date('H:i');
    $sql = mysql_query("SELECT booking.Gen_num,customer.Customer_Name,booking.Customer_name,booking.Customer_num,booking.Unit_num,booking.Street_num,booking.Street_name,booking.suburb,booking.Des_suburb,booking.Pickup_date,booking.Pickup_time FROM booking INNER JOIN customer ON booking.Customer_email=customer.Customer_Email") or exit(mysql_error());

    if(mysql_num_rows($sql))
    {
        echo "</br>";
        echo "<table>";
        echo "<tr>";
            echo "<th>Reference </th>";
            echo "<th>Customer Name</th>";
            echo "<th>Passenger Name</th>";
            echo "<th>Passenger Contact Number</th>";
            echo "<th>Pickup Address</th>";
            echo "<th>Destination Suburb</th>";
            echo "<th>Pickup Time</th>";
        echo "</tr>";
        while($row = mysql_fetch_assoc($sql))
        {
            echo "<tr>";
                echo "<td>".$row['Gen_num']."</td>";
                echo "<td>".$row['Customer_Name']."</td>";
                echo "<td>".$row['Customer_name']."</td>";
                echo "<td>".$row['Customer_num']."</td>";
                echo "<td>".$row['Unit_num']." ".$row['Street_num']." ".$row['Street_name']." ".$row['suburb']."</td>";
                echo "<td>".$row['Des_suburb']."</td>";
                echo "<td>".$row['Pickup_date']." ".$row['Pickup_time']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
 ?>
 <h1>2.Input a reference nunber below and click "update" button to assign a taxi tp that request</h1>
 <label>Reference number:</label>
 <input type="text" name="Reference_num">
 <input type="submit" value="Update">
</html>
