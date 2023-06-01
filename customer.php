<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "756721aA@";
		$dbname = "banking";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		if (isset($_POST['submit'])) {
			// Get form data
			$CustomerID = $_POST['CustomerID'];
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['LastName'];
			$Address = $_POST['Address'];
			$PhoneNumber = $_POST['PhoneNumber'];

			// Insert data into customer table
			$sql = "INSERT INTO customer (CustomerID, FirstName, LastName, Address, PhoneNumber) VALUES ('$CustomerID', '$FirstName', '$LastName', '$Address', '$PhoneNumber')";

			if (mysqli_query($conn, $sql)) {
			    echo "Data inserted successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
	
	<fieldset>
	<legend>Customer Details</legend>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="CustomerID">CustomerID:</label>
		<input type="text" id="CustomerID" name="CustomerID" required><br><br>
		<label for="FirstName">FirstName:</label>
		<input type="text" id="FirstName" name="FirstName"required><br><br>
		<label for="LastName">LastName:</label>
		<input type="text" id="LastName" name="LastName" required><br><br>
		<label for="Address">Address:</label>
		<textarea id="Address" name="Address" rows="4" cols="30" required></textarea><br><br>
		<label for="PhoneNumber">PhoneNumber:</label>
		<input type="number" id="PhoneNumber" name="PhoneNumber" required><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	</fieldset><br>
	<a href="index.html"><button>Main Page</button></a>
</body>
</html>

