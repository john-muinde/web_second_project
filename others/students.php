<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        table {
            margin: auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            background-color: lightblue;
        }
    </style>

</head>

<body>
    <h1>Registered Students</h1>
    <button><a href="register.php">Register Student</a></button>
    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
            <th>Age</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
include 'db.php';
        $sql = "SELECT * FROM students";
        $result = mysqli_query($_DB, $sql);
        if($result) {
            while($row= mysqli_fetch_assoc($result)) {
                $student_id = $row['student_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $course = $row['course'];
                $age = $row['age'];

                echo
                "<tr>
                    <td>$student_id</td>
                    <td>$first_name</td>
                    <td>$last_name</td>
                    <td>$course</td>
                    <td>$age</td>
                    <td><button><a href='delete.php?deleteid=$student_id'>Delete</a></button></td>
                    <td><button> <a href='update.php?updateid=$student_id'>Update</a></button></td>
                </tr>
                ";
            }
        }
        ?>

    </table>

</body>

</html>