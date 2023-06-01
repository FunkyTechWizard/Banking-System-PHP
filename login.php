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

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (isset($_POST['Username'])) {
				$Username = $_POST['Username'];
			} else {
				$Username = '';
			}

			if (isset($_POST['Password'])) {
				$Password = $_POST['Password'];
			} else {
				$Password = '';
			}

			$sql = "INSERT INTO login (Username, Password) VALUES ('$Username', '$Password')";

			if (mysqli_query($conn, $sql)) {
			    echo "Data inserted successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

	
		mysqli_close($conn);
	?>
	
	<fieldset>
	<legend>Login Form</legend>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="username">Username:</label>
		<input type="text" id="Username" name="Username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="Password" name="Password" required><br><br>
		<input type="submit" value="Submit">
	</form>
	</fieldset><br>
	<a href="index.html"><button>Main Page</button></a>
</body>
</html>
