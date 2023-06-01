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

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$TransactionID = $_POST['TransactionID'];
			$AccountNumber = $_POST['AccountNumber'];
			$TransactionType = $_POST['TransactionType'];
			$TransactionDate = $_POST['TransactionDate'];
			$Amount = $_POST['Amount'];
			$Description = $_POST['Description'];

			// Insert data into transaction table
			$sql = "INSERT INTO transaction (TransactionID, AccountNumber, TransactionType, TransactionDate, Amount, Description) VALUES ('$TransactionID', '$AccountNumber', '$TransactionType', '$TransactionDate', '$Amount', '$Description')";

			if (mysqli_query($conn, $sql)) {
			    echo "Data inserted successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
	
	<fieldset>
	<legend>Transaction Details</legend>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="TransactionID">TransactionID:</label>
		<input type="text" id="TransactionID" name="TransactionID" required ><br><br>
		<label for="AccountNumber">AccountNumber:</label>
		<input type="number" id="AccountNumber" name="AccountNumber" required><br><br>
		<label for="TransactionType">TransactionType:</label>
		<input type="text" id="TransactionType" name="TransactionType" required><br><br>
		<label for="TransactionDate">TransactionDate:</label>
		<input type="date" id="TransactionDate" name="TransactionDate" required><br><br>
		<label for="Amount">Amount:</label>
		<input type="number" id="Amount" name="Amount" step="0.01" min="0.00" max="9999999.99" required><br><br>	
		<label for="Description">Description:</label>
		<textarea id="Description" name="Description" rows="4" cols="30" required></textarea><br><br>		
		<input type="submit" value="Submit">
	</form>
	</fieldset><br>
	<a href="index.html"><button>Home Page</button></a>
</body>
</html>
