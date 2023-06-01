<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "756721aA@";
		$dbname = "banking";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		if(isset($_POST['submit'])) { // Check if the form has been submitted
			$AccountNumber = $_POST['AccountNumber'];
			$CustomerID = $_POST['CustomerID'];
			$AccountType = $_POST['AccountType'];
			$AccountBalance = $_POST['AccountBalance'];

			$sql = "INSERT INTO account (AccountNumber, CustomerID, AccountType, AccountBalance) VALUES ('$AccountNumber', '$CustomerID', '$AccountType', '$AccountBalance')";

			if (mysqli_query($conn, $sql)) {
			    echo "Data inserted successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
	
	<fieldset>
	<legend>Account Details</legend>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="AccountNumber">AccountNumber:</label>
		<input type="number" id="AccountNumber" name="AccountNumber" required><br><br>
		<label for="CustomerID">CustomerID:</label>
		<input type="text" id="CustomerID" name="CustomerID" required><br><br>
		<label for="AccountType">AccountType:</label>
		<input type="text" id="AccountType" name="AccountType"required><br><br>
		<label for="AccountBalance">AccountBalance:</label>
		<input type="number" id="AccountBalance" name="AccountBalance" step="0.01" min="0.00" max="9999999.99" required><br><br>	
		<input type="submit" name="submit" value="Submit">
	</form>
	</fieldset><br>
	<a href="index.html"><button>Home Page</button></a>
</body>
</html>
