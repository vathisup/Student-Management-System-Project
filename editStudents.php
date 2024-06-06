<?php
// Connect to the database
$servername = "";
$username = "";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];

    // Update the student's information in the database
    $sql = "UPDATE students SET first_name = '$first_name', last_name = '$last_name', age = '$age', father_name = '$father_name', mother_name = '$mother_name' WHERE student_id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Student information updated successfully";
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Information</title>
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
        h1 {
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
</head>
<body>
	<a href="homepage.php" class="back-button">Back to Homepage</a>
	<h1>Edit Student Information</h1>
	<form method="post">
		<label for="id">Student ID:</label>
		<input type="text" id="id" name="id" required>
		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required>
		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required>
		<label for="age">Age:</label>
		<input type="number" id="age" name="age" required><br>
		<label for="father_name">Father's Name:</label>
		<input type="text" id="father_name" name="father_name" required>
		<label for="mother_name">Mother's Name:</label>
		<input type="text" id="mother_name" name="mother_name" required>
		<input type="submit" value="Update Student Information">
	</form>
</body>
</html>
