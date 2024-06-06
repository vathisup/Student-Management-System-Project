<!DOCTYPE html>
<html>
<head>
	<title>Add Student to Course</title>
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
	<h1>Add Student to Course</h1>
	<?php
		// Check if form has been submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get the student ID and course ID from the form
			$student_id = $_POST["student_id"];
			$course_id = $_POST["course_id"];

			// Connect to the database
			$conn = mysqli_connect("", "", "", "student_db");

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Query to add the student to the course
			$sql = "INSERT INTO student_courses (student_id, course_id) VALUES ('$student_id', '$course_id')";

			if (mysqli_query($conn, $sql)) {
				echo "Student added to course successfully.";
			} else {
				echo "Error adding student to course: " . mysqli_error($conn);
			}

			// Close the database connection
			mysqli_close($conn);
		}
	?>
	<a href="homepage.php" class="back-button">Back to Homepage</a>
	<h1>Add Student to Course</h1>
	<form method="post">
		<label for="student_id">Student ID:</label>
		<input type="text" id="student_id" name="student_id" required>
		<label for="course_id">Course ID:</label>
		<input type="text" id="course_id" name="course_id" required>
		<input type="submit" value="Add Student to Course">
	</form>
</body>