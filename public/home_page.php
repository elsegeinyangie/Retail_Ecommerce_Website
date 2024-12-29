<?php

define('__ROOT__', dirname(__DIR__) . "../app/");
require_once(__ROOT__ . "/view/pages/user/ViewHome.php");
require_once(__ROOT__ . "/view/pages/user/ViewNavbar.php");

$homeView = new ViewHome();
$navbarView = new ViewNavbar();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .promo-box {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .promo-box img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<?php
    echo $navbarView->renderNavbar();
    ?>
    <?php
    echo $homeView->renderCarousel();
    echo $homeView->renderPromotions();
    echo $homeView->renderFooter();
    ?>
    <?php include("hover_button.php"); ?>

</body>

</html>
