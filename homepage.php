<?php
// Start the session
session_start();

// If the user is not logged in, redirect to the login page
if(!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}

// Connect to the database
$conn = mysqli_connect('', '', '', 'student_db');

// Get the instructor's details from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM instructors WHERE username='$username'";
$result = mysqli_query($conn, $query);
$instructor = mysqli_fetch_assoc($result);

// Get the courses the instructor is teaching from the database
$instructor_id = $instructor['instructor_id'];
$query = "SELECT * FROM courses WHERE instructor_id='$instructor_id'";
$result = mysqli_query($conn, $query);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
  <style>
    .back-btn {
      display: inline-block;
      float: left;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin-top: 10px;
      margin-bottom: 20px;
      margin-left: 20px;
      cursor: pointer;
    }
    .manage-btn {
      display: inline-block;
      float: right;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin-top: 10px;
      margin-bottom: 20px;
      margin-left: 20px;
      cursor: pointer;
    }
    button[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
		}

		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
    </style>
<head>
  <div>
    <a href="logout.php" class="back-btn">Log Out</a>
<a href="manageStudents.php" class="manage-btn">Manage Students</a>
  </div>

  
  <title>Homepage</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    h1, h2 {
      color: #333;
      margin-top: 20px;
      margin-bottom: 10px;
    }
    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    li {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
    }
    li:hover {
      background-color: #f9f9f9;
    }
    h3 {
      color: #666;
      margin-top: 0;
      margin-bottom: 5px;
    }
    p {
      margin-top: 0;
      margin-bottom: 0;
    }
  </style>
</head>
<body>
  <h1 style="text-align: center;">Welcome, <?php echo $instructor['first_name']; ?>!</h1>

  <div style="max-width: 800px; margin: 0 auto;">
    <h2>Courses you are teaching:</h2>
    <ul>
      <?php foreach($courses as $course) { ?>
        <li onclick="location.href='classdetail.php?course_id=<?php echo $course['course_id'];?>'">
          <h3><?php echo $course['course_name']; ?></h3>
          <p>Student amount: <?php echo $course['student_amount']; ?></p>
        </li>
      <?php } ?>
    </ul>
    <form action="generate_reports.php" method="get">
		<button type="submit">Generate Reports</button>
	</form>
  </div>
</body>
</html>




