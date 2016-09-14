<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register to CabsOnline</title>
	</head>
	<body>
		<H1>Register to CabsOnline</H1>
		<p>Please fill the fields below to complete your registration</p>
		<form method="post">
			<table>
				<tr>
					<td><label>Name:</label></td>
					<td><input type="text"  name="inputname" placeholder="Name"></td>
				</tr>
				<tr>
					<td><label>Password:</label></td>
					<td><input type="password"  name="inputpass" placeholder="Password"></td>
				</tr>
				<tr>
					<td><label>Confirm password:</label></td>
					<td><input type="password" name="inputconpass" placeholder="Confirm Password"></td>
				</tr>
				<tr>
					<td><label>Email:</label></td>
					<td><input type="email" name="inputemail" placeholder="Email"></td>
				</tr>
				<tr>
					<td><label>Phone:</label></td>
					<td><input type="text" name="inputphn" placeholder="Phone"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Register" /></td>
				</tr>
			</table>
		</form>
		<H2>Already registered? <a href="login.php">Login Here</a></H2>
	</body>
	<?php
	//connecting to the database
	define('DB_HOST','localhost');
	define('DB_NAME','assignment1');
	define('DB_USER','root');
	define('DB_PASSWORD','');

	//create connnection
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	//if(isset($_POST['inputname']) && isset($_POST['inputpass'])&& isset($_POST['inputconpass'])&& isset($_POST['inputemail'])&& isset($_POST['inputphn']) && isset($_POST['submit']))
	if (empty($_POST['inputname']) || empty($_POST['inputpass']) || empty($_POST['inputconpass']) || empty($_POST['inputemail']) || empty($_POST['inputphn']) || empty($_POST['submit']))
	{
		echo "Please fill everything.";
	}
	else if(!empty($_POST['inputname']) || !empty($_POST['inputpass']) || !empty($_POST['inputconpass']) || !empty($_POST['inputemail']) || !empty($_POST['inputphn']) || !empty($_POST['submit']))
	{
		$cusname = $_POST['inputname'];
		$cuspass = $_POST['inputpass'];
		$cusconpass = $_POST['inputconpass'];
		$cusemail = $_POST['inputemail'];
		$cusphn = $_POST['inputphn'];

		$cuspasshash=hash('md5',$_POST['inputpass']);
		$cusconpasshash = hash('md5',$_POST['inputconpass']);

		if($cusconpass != $cuspass)
		{
			echo "Password do not match.";
		}
		else
		{
			$sql =mysql_query("INSERT INTO customer (email,cname,cpass,cconpass,cphone) VALUES('$cusemail','$cusname','$cuspasshash','$cusconpasshash','$cusphn')");
		}
	}
	else
	{

	}
	mysql_close($con);
	?>
</html>
