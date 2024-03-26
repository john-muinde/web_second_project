<?php
include 'includes/operations.php';


if (!isset($_SESSION['user'])) {
    $_SESSION['success'] = "";
    $_SESSION['unsuccess'] = "Kindly login to access the page";
    echo "<script>location.href='login.php'</script>";
}


if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    $userId = $_SESSION['user']['id'];
    $sql = "DELETE FROM wishlist WHERE user_id = '$userId'";
    $result = mysqli_query($DB, $sql);
    $success = "";
    $unsuccess = "";
    if ($result) {
        $success = "Wishlist cleared";
    } else {
        $unsuccess = "Error clearing wishlist";
    }
    $_SESSION['success'] = $success;
    $_SESSION['unsuccess'] = $unsuccess;
    echo "<script>location.href='wishlist.php'</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user']['id'];
    $productId = $_POST['product_id'];
    $redirect = $_POST['redirect'] ?? 'gallery.php';
    $success = "";
    $unsuccess = "";

    $user = mysqli_query($DB, "SELECT * FROM accounts WHERE id = '$userId'");
    if (!$user || mysqli_num_rows($user) <= 0) {
        $unsuccess = "Kindly login to access the feature";
        $_SESSION['success'] = $success;
        $_SESSION['unsuccess'] = $unsuccess;
    } else {
        // wishlist logic
        $sql = "SELECT * FROM wishlist WHERE user_id = '$userId' AND product_id = '$productId'";
        $result = mysqli_query($DB, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            mysqli_query($DB, "DELETE FROM wishlist WHERE user_id = '$userId' AND product_id = '$productId'");
            $success = "Product removed from wishlist";
            $_SESSION['success'] = $success;
            $_SESSION['unsuccess'] = $unsuccess;
        } else {
            $sql = "INSERT INTO wishlist (user_id, product_id) VALUES ('$userId', '$productId')";
            $result = mysqli_query($DB, $sql);
            if ($result == 1) {
                $success = "Product added to wishlist";
            } else {
                $unsuccess = "Error adding product to wishlist";
            }
            $_SESSION['success'] = $success;
            $_SESSION['unsuccess'] = $unsuccess;
        }
    }
}
