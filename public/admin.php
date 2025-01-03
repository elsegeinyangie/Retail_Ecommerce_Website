<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary classes
require_once __DIR__ . "/../app/view/pages/admin/viewAdminComponents.php";

// Initialize the model, controller, and view
// $model = new AdminModel();
// $controller = new AdminController($model);
// $view = new ViewAdminDashboard($controller, $model);
$viewAdminComponents = new ViewAdminComponents();

// Handle actions
// $message = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: 'Work Sans', sans-serif;
        font-size: 18px;
    }

    .user-cart span {
        background-color: #ff0000;
        padding-right: 3px;
        padding-left: 3px;
        border-radius: 10px;
        font-size: 18px;
        margin-left: -1.2rem;
    }

    /*********** admin dashboard styling **********/
    .card {
        background-color: #E3C39D;
        padding: 20px;
        margin: 10px;
        border-radius: 10px;
        box-shadow: 8px 5px 5px #CDD5DB;
    }

    /************************** for sidebar ***********************************/

    /* The sidebar menu */
    .sidebar {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        left: 0;
        background-color: #4b6382;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidebar */
    }

    /* The sidebar links */
    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 22px;
        color: #fff;
        display: block;
        transition: 0.3s;
    }

    .sidebar .side-header {
        margin-left: 30px;
        margin-bottom: 8px;
        color: #fff;
    }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        background-color: #A4B5C4;
    }

    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 2px;
        font-size: 34px;
        margin-left: 50px;
    }

    /* The button used to open the sidebar */
    .openbtn {
        font-size: 20px;
        cursor: pointer;
        padding: 10px 15px;
        border: none;
        color: #A68868;
        background-color: #E3C39D;
    }

    .openbtn:hover {
        color: #071739;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* If you want a transition effect */
        padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }

    /************************** product table styling *********************************/

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0 2px 15px #E3C39D;
        border-radius: 12px 12px 0 0;
        margin-bottom: 50px;
    }

    td,
    th {
        padding: 10px 16px;
        text-align: center;
    }

    th {
        background-color: #E3C39D;
        color: #071739;
        font-family: 'Open Sans', Sans-serif;
        font-weight: bold;
    }

    tr {
        width: 100%;
        background-color: #fafafa;
        font-family: 'Montserrat', sans-serif;
    }

    tr:nth-child(even) {
        background-color: #eeeeee;
    }


    /************************ login and sign up styling  ******************************/

    .card-container.card-account {
        max-width: 500px;
        padding: 30px 30px;
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
* Card component
*/
    .card-account {
        background-color: #3f2fd6;
        /* just in case there no content*/
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 40px;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    /*
* Form styles
*/
    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }

    .reauth-email {
        display: block;
        color: #2121b7;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin #inputEmail,
    .form-signin #inputPassword {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        border-color: #201ac1;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px #8a7a6d;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px #8a7a6d;
    }

    .btn.btn-signin {

        background-color: #2942cf;
        padding: 2px;
        font-weight: 700;
        font-size: 16px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
        background-color: #1c5dd6;
    }


    .box {
        position: relative;
        background-color: #000;
    }

    .image {
        opacity: 1;
        display: block;
        max-width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
        object-fit: contain;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .box:hover .image {
        opacity: 0.3;
    }

    .box:hover .middle {
        opacity: 1;
    }

    .text {
        background-color: #584e46;
        color: #fff;
        font-size: 16px;
        padding: 6px;
        border-radius: 5px;
    }

    /* *******************   cart to login icon styling   ********************* */
    .cart-login-btn {
        margin: 5px;
        border-style: outset;
    }

    .cart-login-btn a i {
        padding: 10px;
        font-size: 30px;
        color: #2e49a3;
    }

    .cart-login-btn a i:hover {
        color: rgb(182, 13, 13);
    }


    /* ****************************   footer  *************************** */
    .footer-hover {
        color: #000;
    }

    .footer-hover:hover {
        color: #ECDAC9;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <?php 
    echo $viewAdminComponents->renderAdminHeader(); 
     echo $viewAdminComponents->renderSidebar();
      ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Customers</h4>
                    <h5 style="color:white;">1</h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Categories</h4>
                    <h5 style="color:white;">4</h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Products</h4>
                    <h5 style="color:white;">8</h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Orders</h4>
                    <h5 style="color:white;">2</h5>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['category'])): ?>
    <?php if ($_GET['category'] == "success"): ?>
    <div class="alert alert-success" role="alert">Category Successfully Added</div>
    <?php elseif ($_GET['category'] == "error"): ?>
    <div class="alert alert-danger" role="alert">Adding Unsuccessful</div>
    <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_GET['size'])): ?>
    <?php if ($_GET['size'] == "success"): ?>
    <div class="alert alert-success" role="alert">Size Successfully Added</div>
    <?php elseif ($_GET['size'] == "error"): ?>
    <div class="alert alert-danger" role="alert">Adding Unsuccessful</div>
    <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_GET['variation'])): ?>
    <?php if ($_GET['variation'] == "success"): ?>
    <div class="alert alert-success" role="alert">Variation Successfully Added</div>
    <?php elseif ($_GET['variation'] == "error"): ?>
    <div class="alert alert-danger" role="alert">Adding Unsuccessful</div>
    <?php endif; ?>
    <?php endif; ?>

    <script type="text/javascript"
        src="/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/public/js/ajaxWork.js"></script>
    <script type="text/javascript"
        src="/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/public/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>