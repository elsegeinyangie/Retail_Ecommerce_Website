<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DB = "lab3";

    $conn = mysqli_connect($servername, $username, $password, $DB);


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>