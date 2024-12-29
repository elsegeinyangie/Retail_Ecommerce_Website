<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary classes
require_once __DIR__ . "/../app/view/pages/auth/viewUser.php";
require_once __DIR__ . "/../app/view/pages/auth/viewAuthComponents.php";
require_once __DIR__ . "/../app/model/user/user.php";
require_once __DIR__ . "/../app/controller/userController.php";

// Initialize the model, controller, and view
$model = new UserModel();
$controller = new UserController($model);
$view = new ViewUser($controller, $model);
$viewAuthComponents = new ViewAuthComponents();

// Handle login or signup actions
$message = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($error) ? 'Error' : (isset($message) ? 'Success' : 'Login or Sign Up'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    :root {
        --primary-color: #071739;
        /* Dark Blue */
        --secondary-color: #4b6382;
        /* Light Blue */
        --accent-color-1: #A68868;
        /* Light Gold */
        --accent-color-2: #E3C39D;
        /* Light Beige */
        --bg-color-light: #CDD5DB;
        /* Light Gray */
        --bg-color-secondary: #A4B5C4;
        /* Light Blue-Gray */
        --text-light: #fff;
        /* White text */
        --text-dark: #071739;
        /* Dark text */
    }

    .registration-navbar,
    .registration-footer {
        background-color: var(--secondary-color);
        height: 10vh;
        padding: 5px;
    }

    .registration-navbar {
        margin-bottom: 5vh;
        z-index: 1000;
    }

    .registration-navbar-logo,
    .registration-navbar-slogan,
    .registration-footer {
        color: var(--text-light);
    }

    .registration-navbar-log {
        margin: 0;
    }

    .registration-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .submit-btn {
        color: var(--text-light);
        background-color: var(--accent-color-1);
        border-radius: 10px;
        padding: 6px;
        border: none;
        font-weight: 600;
    }

    .submit-btn:hover {
        background-color: var(--accent-color-2);
        color: var(--text-dark);
    }

    /* unvisited link */
    a:link {
        color: var(--secondary-color);
        text-decoration: none;
    }

    /* mouse over link */
    a:hover,
    .link:hover {
        color: var(--text-dark);
        text-decoration-line: underline;
    }

    .link {
        text-decoration: none;
        color: var(--secondary-color);
    }
    </style>
</head>

<body>
    <?php echo $viewAuthComponents->renderAuthNavbar(); ?>
    <?php if (isset($_GET['action']) && $_GET['action'] === 'login'): ?>
    <?php if (isset($message)): ?>
    <p style="color:red; text-align:center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <div>
        <?php echo $view->renderLoginForm(); ?>
    </div>
    <?php echo $view->renderForgotPasswordModal(); ?>
    <?php elseif (isset($_GET['action']) && $_GET['action'] === 'signup'): ?>
    <?php if (isset($message)): ?>
    <p style="color:red; text-align:center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <div>
        <?php echo $view->renderSignUpForm(); ?>
    </div>
    <?php echo $view->renderTermsAndConditionsModal(); ?>
    <?php endif; ?>
    <?php echo $viewAuthComponents->renderAuthFooter(); ?>
    <script src="/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/public/js/validation.js"></script>
</body>

</html>