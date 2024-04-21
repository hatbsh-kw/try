<?php
	// Check if form has been submitted
	if (isset($_POST['submit'])) {
		// Connect to the database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Insert form data into the database
		if($_SERVER['REQUEST_METHOD'] =='POST'){

			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
		

	

		// Close the database connection
		$conn->close();
	}
	?>