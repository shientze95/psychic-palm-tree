<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Booking a cab</title>
	</head>
	<body>
		<H1>Booking a cab</H1>
		<p>Please fill the fields below to book a taxi</p>
		<form method="post">
			<table>
				<tr>
					<td><label>Passenger name</label></td>
					<td><input type="text" name="inputname" placeholder="Name" value=""></td>
				</tr>
				<tr>
					<td><label >Contact phone of the passenger:</label></td>
					<td><input type="text" name="inputcontact" placeholder="Contact" value=""></td>
				</tr>
				<tr>
					<td><label>Pick up address:</label></td>
					<td>
						<label>Unit number<input type="text" name="unitnum"></label><br>
						<label >Street number<input type="text" name="streetnum"></label><br>
						<label >Street name<input type="text" name="streetname"></label><br>
						<label>Suburb<input type="text" name="suburb"></label>
					</td>
				</tr>
				<tr>
					<td><label>Destination suburb:</label></td>
					<td><input type="text" name="dessuburb" placeholder="Suburb"></td>
				</tr>
				<tr>
					<td><label>Pickup date:</label></td>
					<td><input type="date" name="pickdate" placeholder="Date"></td>
				</tr>
				<tr>
					<td><label>Pickup time:</label></td>
					<td><input type="time" name="picktime" placeholder="Time"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Book" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	define('DB_HOST','localhost');
	define('DB_NAME','assignment1');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	session_start();
	//Create connection
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	//Set default time zone
	date_default_timezone_set("Asia/Kuching");
	echo "Current Server Time:".date('l jS \of F Y h:i A')."<br>";

	//Check if inputs are empty
	if (!empty($_POST['inputname']) && !empty($_POST['inputcontact']) && !empty($_POST['streetnum']) && !empty($_POST['streetname']) && !empty($_POST['suburb'])&& !empty($_POST['dessuburb'])&& !empty($_POST['pickdate'])&&
	!empty($_POST['picktime']))
	{
		$cusemail = $_SESSION['inputemail'];
		$cusname = $_POST['inputname'];
		$cuscontact = $_POST['inputcontact'];
		$unitnum = $_POST['unitnum'];
		$streetnum =$_POST['streetnum']  ;
		$streetname = $_POST['streetname'];
		$suburb = $_POST['suburb'];
		$dessuburb = $_POST['dessuburb'];
		$pickdate = $_POST['pickdate'];
		$picktime = $_POST['picktime'];
		$gendate = date('Y-m-d');
		$gentime = date('H:i:A');//Time and date differences
		//Time
		$remainder = strtotime($picktime) - strtotime(date('H:i'));
		//Date
		$remainder1 =strtotime($gendate) - strtotime($pickdate);
		//Check if input date save as current date
		if (strcmp($pickdate, date('Y-m-d')) == 0)
		{
			//Check the differences in time is more than a hour
			if ($remainder >=3600)
			{
				//Add the booking to database
				$sql =mysql_query("INSERT INTO booking (Customer_email,Customer_name,Customer_num,Unit_num,Street_num,Street_name,suburb,Des_suburb,Pickup_date,Pickup_time,Gen_date,Gen_time)
				VALUES('$cusemail','$cusname','$cuscontact','$unitnum','$streetnum','$streetname','$suburb','$dessuburb','$pickdate','$picktime','$gendate','$gentime')");
				 $last_id = mysql_insert_id($con);
				echo "Thanks you! Your booking reference number is $last_id. We will pick up the passengers in front of your provided address at $picktime on $pickdate.";
			}
			else
			{
				echo "Time do not meet requirement. Please insert a time which is atleast an hour after current.<br>";
			}
		}
		//Check if date inserted is less than current date
		else if ($remainder1 >= 31622400 ||$remainder1 >= 2678400 ||$remainder1 >= 86400)
		{
			echo "Please insert an appropriate date.<br>";
		}
		//Check if input date is after current date
		else
		{
			$sql =mysql_query("INSERT INTO booking (Customer_name,Customer_email,Customer_num,Unit_num,Street_num,Street_name,suburb,Des_suburb,Pickup_date,Pickup_time,Gen_date,Gen_time)
			VALUES('$cusname','$cusemail','$cuscontact','$unitnum','$streetnum','$streetname','$suburb','$dessuburb','$pickdate','$picktime','$gendate','$gentime')");
			$last_id = mysql_insert_id($con);
			echo "Thanks you! Your booking reference number is $last_id. We will pick up the passengers in front of your provided address at $picktime on $pickdate.";
		}
	}
	else
	{
		echo "Please fill everything";
	}
?>
