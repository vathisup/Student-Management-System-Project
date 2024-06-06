<!DOCTYPE html>
<html>
<head>
	<title>Add Students</title>
</head>
<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f1f1f1;
		}

		h2 {
			text-align: center;
			margin-top: 20px;
		}

		form {
			background-color: #fff;
			padding: 20px;
			margin: 20px auto;
			max-width: 500px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
		}

		label {
			display: inline-block;
			width: 120px;
			margin-bottom: 10px;
		}

		input[type="text"] {
			padding: 5px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 4px;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
			float: right;
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
<body>
	<?php
	// connect to the database
	$servername = "";
	$username = "";
	$password = "";
	$dbname = "student_db";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// define variables and set to empty values
	$student_id = $first_name = $last_name = $age = $father_name = $mother_name = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$student_id = test_input($_POST["student_id"]);
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);
		$age = test_input($_POST["age"]);
		$father_name = test_input($_POST["father_name"]);
		$mother_name = test_input($_POST["mother_name"]);

		// insert data into the database
		$sql = "INSERT INTO students (student_id, first_name, last_name, age, father_name, mother_name) VALUES ('$student_id', '$first_name', '$last_name', '$age', '$father_name', '$mother_name')";

		if ($conn->query($sql) === TRUE) {
			echo "New student added successfully";
            header('Location: homepage.php');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	// close the database connection
	$conn->close();

	// function to sanitize input values
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>
    <a href="homepage.php" class="back-button">Back to Homepage</a>
	<h2>Add Students</h2>


	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Student ID:</label>
		<input type="text" name="student_id"><br><br>
		<label>First Name:</label>
		<input type="text" name="first_name"><br><br>
		<label>Last Name:</label>
		<input type="text" name="last_name"><br><br>
		<label>Age:</label>
		<input type="text" name="age"><br><br>
		<label>Father's Name:</label>
		<input type="text" name="father_name"><br><br>
		<label>Mother's Name:</label>
		<input type="text" name="mother_name"><br><br>
		<input type="submit" name="submit" value="Add Student">
	</form>
</body>
</html>
