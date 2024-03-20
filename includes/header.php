<?php
include 'connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/styles.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <title>Artistic Gallery - <?= $page  ?></title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@100&display=swap");
    </style>

    <script src="https://cdn.jsdelivr.net/npm/toaster-ui@1.1.5/dist/main.js"></script>
    <script src="assets/js/message.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <?php
    echo json_encode($_SESSION);
    ?>
    <script>
        <?php
        echo "window.onload = () => {
                const toaster = new ToasterUi();

                const options = {
                    duration: 3500,
                };

                toaster.error = (message) => {
                    toaster.addToast(message, 'error', options);
                };
                toaster.success = (message) => {
                    toaster.addToast(message, 'success', options);
                };

                console.log('Message.js loaded');
                window.toaster = toaster;
      
            ";
        $success = $_SESSION['success'];
        $unsuccess = $_SESSION['unsuccess'];

        if (isset($success) && $success !== "") {
            echo "window.toaster.success('{$success}');";
            //$_SESSION['success'] = "";
        }

        if (isset($unsuccess) && $unsuccess !== "") {
            echo "window.toaster.error('{$unsuccess}');";
            //$_SESSION['unsuccess'] = "";
        }
        echo "};";
        ?>
    </script>

</head>

<body class="<?= $body_class ?>">
    <div class="cont <?= $cont_class ?>">
        <nav class="navbar">
            <a class="navbar-brand" href="#">
                <img class="logo" src="/assets/images/logo/logo-artistic-color.png" alt="" />
            </a>
            <ul class="navbar-nav">
                <?php
                $navItems = [
                    "Home" => ["route" => "index.php", "page" => "Index", "visible" => true],
                    "About Us" => ["route" => "about.php", "page" => "About Us", "visible" => true],
                    "Our Gallery" => ["route" => "gallery.php", "page" => "Gallery", "visible" => true],
                    "Login" => ["route" => "login.php", "page" => "Login", "visible" => !isset($_SESSION['user'])],
                    "Register" => ["route" => "register.php", "page" => "Register", "visible" => !isset($_SESSION['user'])],
                    "Logout" => ["route" => "logout.php", "page" => "Logout", "visible" => isset($_SESSION['user'])],
                    "Profile" => ["route" => "profile.php", "page" => "Profile", "visible" => isset($_SESSION['user'])],
                ];

                foreach ($navItems as $key => $value) {
                    $active = $value['page'] === $page ? "active" : "";
                    if ($value['visible']) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $active ?>" href="<?= $value['route'] ?>"><?= $key ?></a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </nav>
        <div class="hero-content">
            <?= $heroContent ?>
        </div>
    </div>