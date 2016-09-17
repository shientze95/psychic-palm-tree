<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Booking a cab</title>
	</head>
	<body>
		<H1>Booking a cab</H1>
		<p>Please fill the fields below to book a taxi</p>
		<form>
			<table>
				<tr>
					<td><label for="inputname">Passenger name</label></td>
					<td><input type="text" id="inputname" placeholder="Name" value=""></td>
				</tr>
				<tr>
					<td><label for="inputcontact">Contact phone of the passenger:</label></td>
					<td><input type="text" id="inputcontact" placeholder="Password" value=""></td>
				</tr>
				<tr>
					<td><label for="inputaddress">Pick up address:</label></td>
					<td>
						<label for="unitnum">Unit number<input type="text" id="unitnum"></label><br>
						<label for="streetnum">Street number<input type="text" id="streetnum"></label><br>
						<label for="streetname">Street name<input type="text" id="streetname"></label><br>
						<label for="suburb">Suburb<input type="text" id="suburb"></label>
					</td>
				</tr>
				<tr>
					<td><label for="dessuburb">Destination suburb:</label></td>
					<td><input type="text" id="dessuburb" placeholder="Suburb"></td>
				</tr>
				<tr>
					<td><label for="pickdate">Pickup date:</label></td>
					<td><input type="text" id="pickdate" placeholder="Date"></td>
				</tr>
				<tr>
					<td><label for="picktime">Pickup time:</label></td>
					<td><input type="text" id="picktime" placeholder="Time"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Book" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>
