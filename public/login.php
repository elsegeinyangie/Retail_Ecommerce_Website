<?php
// Include the ViewLogin.php file at the top
require_once("../app/view/pages/auth/viewLogin.php");
require_once("../app/view/pages/auth/viewAuthComponents.php");
require_once("../app/view/pages/auth/viewSignUp.php");

$viewLogin = new ViewLogin();
$viewSignUp = new ViewSignUp();
$viewAuthComponents = new ViewAuthComponents();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/registration_styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        echo $viewAuthComponents->renderAuthNavbar();
    ?>
    <div class="login-container">
        <?php
            echo $viewLogin->renderLoginForm();
        ?>
    </div>

    <!-- Include the Forgot Password Modal -->
    <?php
        echo $viewLogin->renderForgotPasswordModal();
    ?>


    <?php
        echo $viewAuthComponents->renderAuthFooter();
    ?>
</body>

</html>