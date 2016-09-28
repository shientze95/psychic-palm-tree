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
	include 'datatable.php';
	session_start();
	/*Checks if inputs are not empty, else provide them an error.*/
	if (!empty($_POST['inputemail']) && !empty($_POST['inputpass']))
	{
		$cusemail =$_POST['inputemail'];
		$_SESSION['inputemail'] =$cusemail;
		/*Hash password that is to be use to store in the database.*/
		$cuspass = hash('md5',$_POST['inputpass']);

		/*shows the email and Password of input email from customer table*/
		$usedemail = mysql_query("SELECT Customer_Email FROM customer where Customer_Email = '$cusemail'") or exit(mysql_error());
		$usedpass = mysql_query("SELECT Customer_Password FROM customer where Customer_Password = '$cuspass'") or exit(mysql_error());

		/*check if the email and Password are true then redirect user to the booking page else provide user an error.*/
		if (mysql_num_rows($usedemail) && mysql_num_rows($usedpass))
		{
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
