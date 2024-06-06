<?php
// Establish database connection
$conn = mysqli_connect("", "", "", "student_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $course_id = $_POST["course_id"];
    $grade = $_POST["grade"];

    // Insert the grade information into the student_courses table
    $sql = "UPDATE student_courses SET grade = $grade WHERE student_id = $student_id AND course_id = $course_id;";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Grade has been set successfully!</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Set Grade</title>
    
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
    <h1>Set Grade</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br><br>

        <label for="course_id">Course ID:</label>
        <input type="text" id="course_id" name="course_id" required><br><br>

        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" required><br><br>

        <input type="submit" value="Set Grade">
    </form>
</body>
</html>
