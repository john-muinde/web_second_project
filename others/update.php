<?php
$updateid = $_GET['updateid'];

include 'db.php';

$sql = "SELECT * FROM students WHERE student_id = $updateid";
$result = mysqli_query($_DB, $sql);

if($result) {
    $student = mysqli_fetch_assoc($result);
    // check if student exists
    if(!$student) {
        die("Student not found");
    }
    $first_name = $student['first_name'];
    $last_name = $student['last_name'];
    $course = $student['course'];
    $age = $student['age'];
} else {
    die("Error: " . $sql . "<br>" . mysqli_error($_DB));
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET first_name = '$first_name', last_name = '$last_name', course = '$course', age = $age WHERE student_id = $updateid";

    $result = mysqli_query($_DB, $sql);

    if($result) {
        echo "Student updated successfully";
        // wait for a few seconds before redirecting
        header('Location: students.php');
    } else {
        die("Error updating student: " . mysqli_error($_DB));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>

<body>
    <h1>Update Students</h1>
    <button><a href="students.php">View Students</a></button>
    <form method="post">
        <label for="first_name"> First Name</label><br>
        <input type="text" name="first_name" placeholder="First Name"
            value="<?php echo $first_name ?>" required>
        <br>
        <label for="last_name"> Last Name</label><br>
        <input type="text" name="last_name" placeholder="Last Name"
            value="<?php echo $last_name ?>" required>
        <br>
        <label for="course"> Course Name</label><br>
        <select name="course" id="course">
            <option value="Computer Science" <?php echo "Computer Science" == $course ? 'selected': '' ?>>Computer
                Science</option>
            <option value="Information Technology" <?php echo "Information Technology" == $course ? 'selected': '' ?>>Information
                Technology</option>
            <option value="Software Engineering" <?php echo "Information Technology" == $course ? 'selected': '' ?>>Software
                Engineering</option>
        </select>
        <br>
        <label for="age">Age</label><br>
        <input type="number" name="age" placeholder="Age"
            value="<?php echo $age ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>

</html>