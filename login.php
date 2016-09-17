<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login to CabsOnline</title>
	</head>
	<body>
		<form method="post">
			<H1>Login to CabsOnline</H1>
			<table>
        <tr>
            <td><label>Email:</label></td>
            <td><input type="text" name="inputemail" placeholder="Email"/></td>
        </tr>
        <tr>
            <td> <label>Password: </label></td>
            <td><input type="password" name="inputpass" placeholder="Password"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Login"/></td>
        </tr>
    </table>
		</form>
		<H2>New member?<a href="register.php">Register now</a></H2>
	</body>
</html>
<?php
	define('DB_HOST','localhost');
	define('DB_NAME','assignment1');
	define('DB_USER','root');
	define('DB_PASSWORD','');

	//create connection
	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	if (!empty($_POST['inputemail']) && !empty($_POST['inputpass']))
	{
		$cusemail =$_POST['inputemail'];
		//hashed the user Password
		$cuspass = hash('md5',$_POST['inputpass']);

		//shows the email and Password of input email from customer table
		$usedemail = mysql_query("SELECT Customer_Email FROM customer where Customer_Email = '$cusemail'") or exit(mysql_error());
		$usedpass = mysql_query("SELECT Customer_Password FROM customer where Customer_Email = '$cusemail'") or exit(mysql_error());

		//check if the email and Password are true
		if (mysql_num_rows($usedemail) && mysql_num_rows($usedpass))
		{						
			//redirect to the booking page
			header( "Location: booking.php" ); die;

		}
		else
		{
			echo "Customer does not exist. Please proceed to Register page.";
		}
	}
	else
	{
		echo "Please fill everything.";
	}
?>
