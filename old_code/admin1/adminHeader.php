<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./style.css">
        </link>
    </head>
</head>
<script type="text/javascript" src="./ajaxWork.js"></script>
<script type="text/javascript" src="./script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<!-- nav -->
<nav class="navbar navbar-expand navbar-light px-5" style="background-color: #071739;">

    <a class="navbar-brand ml-5" href="./index.php">
        <img src="../assets/imgs/logo.png" width="80" height="80" alt="profile_picture">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    <div class="user-cart">
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
        <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
        <?php
        } else {
            ?>
        <a href="" style="text-decoration:none;">
            <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>

        <?php
        } ?>
    </div>
</nav>