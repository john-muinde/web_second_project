<?php
include 'includes/connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    if (!isset($_SESSION['user'])) {
        $_SESSION['success'] = "";
        $_SESSION['unsuccess'] = "Kindly login to access the page";
        echo "<script>location.href='login.php'</script>";
    }
}

$user = $_SESSION['user'];

$unsuccess = "";
$success = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $update_password = $_POST['update_password'] ?? 0;
    $profile_picture = $_FILES['profile_picture'] ?? null;
    $profile_picture_name = $profile_picture['name'] ?? null;
    $data = [
        'full_name' => $_POST['full_name'],
        'email' => $email,
        'gender' => $gender
    ];

    if (isset($profile_picture) && isset($profile_picture_name) && !empty($profile_picture_name)) {
        $profile_picture_tmp = $profile_picture['tmp_name'];
        $profile_picture_size = $profile_picture['size'];
        $profile_picture_error = $profile_picture['error'];
        $profile_picture_type = $profile_picture['type'];

        $profile_picture_ext = explode('.', $profile_picture_name);
        $profile_picture_actual_ext = strtolower(end($profile_picture_ext));

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($profile_picture_actual_ext, $allowed)) {
            if ($profile_picture_error === 0) {
                if ($profile_picture_size < 1000000) {
                    $profile_picture_name_new = uniqid('', true) . "." . $profile_picture_actual_ext;
                    $profile_picture_destination = 'uploads/' . $profile_picture_name_new;
                    move_uploaded_file($profile_picture_tmp, $profile_picture_destination);
                    $data['profile_picture'] = $profile_picture_destination;
                } else {
                    $unsuccess = "Your file is too big! Please upload a file less than 1MB.";
                }
            } else {
                $unsuccess = "There was an error uploading your file!";
            }
        } else {
            $unsuccess = "You cannot upload files of this type!";
        }
    }

    if (empty($unsuccess)) {
        $sql = "UPDATE accounts SET full_name = '{$data['full_name']}', gender = '{$data['gender']}', email = '{$data['email']}'";

        if ($update_password) {
            if ($password !== $password_confirm) {
                $unsuccess = "Passwords do not match";
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $data['password'] = $password_hash;
                $sql .= ", password = '{$data['password']}'";
            }
        }

        if (isset($data['profile_picture'])) {
            $sql .= ", profile_picture = '{$data['profile_picture']}'";
        }

        $sql .= " WHERE id = {$user['id']}";

        $result = mysqli_query($DB, $sql);

        if ($result) {
            $success =  "Account updated successfully";
        } else {
            $unsuccess = "Error: " . $sql . "<br>" . mysqli_error($DB);
        }
    }
    $user = mysqli_fetch_assoc(mysqli_query($DB, "SELECT * FROM accounts WHERE id = {$user['id']}"));
    $_SESSION['user'] = $user;
    $_SESSION['success'] = $success;
    $_SESSION['unsuccess'] = $unsuccess;

    header("Location: profile.php");
}
