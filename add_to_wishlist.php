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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user']['id'];
    $productId = $_POST['product_id'];
    $redirect = $_POST['redirect'] ?? 'gallery.php';
    $success = "";
    $unsuccess = "";


    $user = mysqli_query($DB, "SELECT * FROM accounts WHERE id = '$userId'");
    if (!$user || mysqli_num_rows($user) <= 0) {
        $unsuccess = "User does not exist";
    } else {
        // wishlist logic
        $sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$userId', '$productId')";
        $result = mysqli_query($DB, $sql);
        if ($result) {
            $success = "Product added to wishlist";
        } else {
            $unsuccess = "Error adding product to wishlist";
        }
    }
    $_SESSION['success'] = $success;
    $_SESSION['unsuccess'] = $unsuccess;
}
