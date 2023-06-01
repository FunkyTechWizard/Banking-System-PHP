<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    
    $CustomerID = $_POST['CustomerID'];

    $servername = "localhost";
    $username = "root";
    $password = "756721aA@";
    $dbname = "banking";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql="SELECT c.CustomerID, a.AccountNumber, a.AccountType, a.AccountBalance, c.LastName, c.FirstName, c.Address
	FROM customer c
	JOIN account a
	ON c.CustomerID = a.CustomerID
	WHERE a.CustomerID = '$CustomerID'";
	
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        die("Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Account Details:</h2>";
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>AccountNumber:</td><td>" . $row["AccountNumber"] . "</td></tr>";
            echo "<tr><td>CustomerID:</td><td>" . $row["CustomerID"] . "</td></tr>";
            echo "<tr><td>AccountType:</td><td>" . $row["AccountType"] . "</td></tr>";
            echo "<tr><td>AccountBalance:</td><td>" . $row["AccountBalance"] . "</td></tr>";
            echo "<tr><td>LastName:</td><td>" . $row["LastName"] . "</td></tr>";
            echo "<tr><td>FirstName:</td><td>" . $row["FirstName"] . "</td></tr>";
            echo "<tr><td>Address:</td><td>" . $row["Address"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No records found! ";
    }

    mysqli_close($conn);
?>
</body>
</html>