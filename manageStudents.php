<!DOCTYPE html>
<html>
<head>
	<title>Manage Students</title>
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
		.container {
			max-width: 800px;
			margin: 0 auto;
			text-align: center;
		}
		button {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 10px;
			margin-bottom: 10px;
			display: block;
			width: 100%;
		}
		button:hover {
			background-color: #f9f9f9;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center;">Manage Students</h1>

    
	
	<div class="container">
		<button onclick="location.href='addStudents.php'">Add Students</button>
		<button onclick="location.href='deleteStudents.php'">Delete Students</button>
		<button onclick="location.href='addStudentsToClass.php'">Add Students to Class</button>
		<button onclick="location.href='removeStudents.php'">Remove Students from Class</button>
		<button onclick="location.href='editStudents.php'">Edit Student Information</button>
        <button onclick="location.href='setGrade.php'">Set Grade</button>
	</div>

</body>
</html>
