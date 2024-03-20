<?php
include 'db.php';
$deleteid = $_GET['deleteid'];
$sql = "DELETE FROM students WHERE student_id = $deleteid";
$result = mysqli_query($_DB, $sql);

if($result) {
    header('Location: students.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($_DB);
}
