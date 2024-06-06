<!DOCTYPE html>
<html>
<head>
	<title>Delete Student</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f1f1f1;
		}

		h1 {
			text-align: center;
			margin-top: 20px;
		}

		form {
			margin: 20px auto;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			padding: 20px;
			width: 80%;
			max-width: 600px;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"] {
			padding: 8px;
			border-radius: 4px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 20px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		.back-button {
			position: fixed;
			top: 20px;
			left: 20px;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
		}

		.back-button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<a href="homepage.php" class="back-button">Back to Homepage</a>
	<h1>Delete Student</h1>
	<?php
		// Check if form has been submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get the student ID from the form
			$student_id = $_POST["student_id"];

			// Connect to the database
			$conn = mysqli_connect("", "", "", "student_db");

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Query to delete the student with the given ID
			$sql = "DELETE FROM students WHERE student_id = $student_id";

			if (mysqli_query($conn, $sql)) {
				echo "Student deleted successfully.";
			} else {
				echo "Error deleting student: " . mysqli_error($conn);
			}

			// Close the database connection
			mysqli_close($conn);
		}
	?>
	<form method="post">
		<label for="student_id">Student ID:</label>
		<input type="text" id="student_id" name="student_id" required>
		<input type="submit" value="Delete Student">
	</form>
</body>
</html>
