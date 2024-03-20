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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
                    "Home" => ["route" => "index.php", "page" => "Index"],
                    "About Us" => ["route" => "about.php", "page" => "About Us"],
                    "Our Gallery" => ["route" => "gallery.php", "page" => "Gallery"],
                    "Login" => ["route" => "login.php", "page" => "Login"],
                    "Register" => ["route" => "register.php", "page" => "Register"],
                ];

                foreach ($navItems as $key => $value) {
                    $active = $value['page'] === $page ? "active" : "";
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $active ?>" href="<?= $value['route'] ?>"><?= $key ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <div class="hero-content">
            <?= $heroContent ?>
        </div>
    </div>