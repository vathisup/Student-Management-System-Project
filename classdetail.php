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

// Get the course id from the URL parameter
$course_id = $_GET['course_id'];

// Get the course information from the database
$query = "SELECT * FROM courses WHERE course_id='$course_id'";
$result = mysqli_query($conn, $query);
$course = mysqli_fetch_assoc($result);

// Get the student information for the course from the database
$query = "SELECT students.student_id, students.first_name, students.last_name, student_courses.grade FROM students INNER JOIN student_courses ON students.student_id=student_courses.student_id WHERE student_courses.course_id='$course_id'";
$result = mysqli_query($conn, $query);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Class Details</title>
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
    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
    }
    th, td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    .back-btn {
      display: inline-block;
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
  </style>
</head>
<body>
    <a href="homepage.php" class="back-btn">Back</a>
  <h1 style="text-align: center;"><?php echo $course['course_name']; ?></h1>
  <table>
    <tr>
      <th>Student Name</th>
      <th>Grade</th>
    </tr>
    <?php foreach($students as $student) { ?>
      <tr>
        <td><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></td>
        <td><?php echo $student['grade']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>