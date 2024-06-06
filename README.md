### README.md

# Instructor Management System

## Overview
The Instructor Management System is a web-based application that allows instructors to manage courses and students. Instructors can log in, view the courses they are teaching, manage students, and generate reports.

## Features
- **Instructor Login**: Instructors can log in to access their personalized dashboard.
- **Course Management**: Instructors can view courses they are teaching.
- **Student Management**: Instructors can manage students enrolled in their courses.
- **Report Generation**: Instructors can generate reports for their courses and students.

## Technologies Used
- HTML5
- CSS3
- PHP
- MySQL

## Prerequisites
- Web server with PHP support (e.g., Apache)
- MySQL database
- Web browser

## Installation

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Set up the MySQL database**:
   - Create a database named `student_db`.
   - Import the provided SQL file to create the required tables and insert initial data.


3. **Configure database connection**:
   - Open the PHP files and update the database connection details (`host`, `username`, `password`, `dbname`).

4. **Start the web server**:
   - Place the project directory in the web server's root directory.
   - Start the web server.

5. **Access the application**:
   - Open a web browser and navigate to `http://localhost/<project-directory>/login.php`.

## File Structure

```
.
├── addStudents.php
├── addStudentsToClass.php
├── classDetails.php
├── deleteStudents.php
├── editStudents.php
├── generate_reports.php
├── manage_students.php
├── remove_students.php
├── setGrades.php
├── login.php
├── logout.php
├── index.php (homepage)
└── README.md
```

## File Descriptions

- **addStudents.php**: Add new students to the database.
- **addStudentsToClass.php**: Add students to specific courses.
- **classDetails.php**: View details of a specific class, including enrolled students.
- **deleteStudents.php**: Delete students from the database.
- **editStudents.php**: Edit student information.
- **generate_reports.php**: Generate reports for courses and students.
- **manage_students.php**: Manage students, including adding and removing students from courses.
- **remove_students.php**: Remove students from specific courses.
- **setGrades.php**: Set grades for students in courses.
- **login.php**: Instructor login page.
- **logout.php**: Instructor logout script.
- **index.php**: Instructor homepage displaying courses and allowing access to student management and report generation.

## Usage

1. **Login**:
   - Navigate to `http://localhost/<project-directory>/login.php`.
   - Enter the instructor username and password to log in.

2. **View Courses**:
   - After logging in, the homepage (`index.php`) displays the courses the instructor is teaching.
   - Click on a course to view details.

3. **Manage Students**:
   - Use the "Manage Students" button to add or remove students from courses.

4. **Generate Reports**:
   - Use the "Generate Reports" button to generate and download reports for courses and students.

## Security

- Ensure that proper validation and sanitization are implemented for all user inputs to prevent SQL injection and other security vulnerabilities.
- Use HTTPS to secure communication between the client and server.

## Troubleshooting

- **Database Connection Errors**: Ensure the database connection details in the PHP files are correct and that the MySQL server is running.
- **Session Issues**: Make sure PHP sessions are properly configured and the session_start() function is called at the beginning of each PHP file that uses sessions.


## Contact

For any issues or questions, please contact leu.chankunvath123@gmail.com.
