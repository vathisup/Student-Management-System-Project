<!DOCTYPE html>
<html>
<head>
	<title>Generate Reports</title>
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

		table {
			margin: 20px auto;
			border-collapse: collapse;
			width: 80%;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #4CAF50;
			color: #fff;
		}

		tr:hover {
			background-color: #f5f5f5;
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
	<h1>Student Reports</h1>
	<?php
		// Connect to the database
		$conn = mysqli_connect("", "", "", "student_db");

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Query to fetch all students and their courses with grades
		$sql = "SELECT s.student_id, s.first_name, s.last_name, c.course_name, sc.grade
				FROM students AS s
				JOIN student_courses AS sc ON s.student_id = sc.student_id
				JOIN courses AS c ON sc.course_id = c.course_id
				ORDER BY s.student_id";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Course Name</th><th>Grade</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["course_name"] . "</td><td>" . $row["grade"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "No results found.";
		}

		// Close the database connection
		mysqli_close($conn);
	?>
</body>
</html>
