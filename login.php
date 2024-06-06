<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}

		form {
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			width: 300px;
			margin: 50px auto;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"], input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #ffffff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			cursor: pointer;
			font-size: 16px;
			width: 100%;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		.error {
			color: #ff0000;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<?php
	session_start(); // Start a session to store user data

	// Check if the form has been submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  // Get the username and password submitted by the user
	  $username = $_POST['username'];
	  $password = $_POST['password'];

	  // Connect to the database
	  $conn = mysqli_connect('', '', '', 'student_db');

	  // Check if the connection was successful
	  if (!$conn) {
	    die('Connection failed: ' . mysqli_connect_error());
	  }

	  // Build a SQL query to retrieve the instructor with the given username and password
	  $query = "SELECT * FROM instructors WHERE username='$username' AND password='$password'";

	  // Execute the query
	  $result = mysqli_query($conn, $query);

	  // Check if the query was successful
	  if (!$result) {
	    die('Query failed: ' . mysqli_error($conn));
	  }

	  // Check if a row was returned (i.e., the username and password were correct)
	  if (mysqli_num_rows($result) == 1) {
	    // Store the user's data in the session
	    $_SESSION['username'] = $username;
	    $_SESSION['loggedin'] = true;

	    // Redirect the user to the homepage
	    header('Location: homepage.php');
	    exit;
	  } else {
	    // Display an error message if the username or password was incorrect
	    $error = "Incorrect username or password. Please try again.";
	  }

	  // Close the database connection
	  mysqli_close($conn);
	}
	?>

	<!-- HTML form to collect the user's username and password -->
	<form method="POST" action="">
	  <?php if(isset($error)) { ?>
	  	<p class="error"><?php echo $error; ?></p>
	  <?php } ?>

	  <label>Username:</label>
	  <input type="text" name="username">

	  <label>Password:</label>
	  <input type="password" name="password">

	  <input type="submit" value="Login">

    </form>
