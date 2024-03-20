<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <button><a href="students.php">View Students</a></button>
    <form action="register.php" method="post">
        <label for="first_name"> First Name</label><br>
        <input type="text" name="first_name" placeholder="First Name" required>
        <br>
         <label for="last_name"> Last Name</label><br>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <br>
         <label for="course"> Course Name</label><br>
        <select name="course" id="course">
            <option value="Computer Science">Computer Science</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Software Engineering">Software Engineering</option>
        </select>
        <br>
        <label for="age">Age</label><br>
        <input type="number" name="age" placeholder="Age" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>

<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $age = $_POST['age'];

    // insert sql
    $sql = "INSERT INTO students (first_name, last_name, course, age) VALUES ('$first_name', '$last_name', '$course', $age)";

    $result = mysqli_query($_DB, $sql);

    if($result) {
        echo "Student registered successfully";
    } else {
        echo "Error registering student: " . mysqli_error($_DB);
    }
}
