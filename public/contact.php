<?php
define('__ROOT__', dirname(__DIR__) . "../app/");

// Include the ViewContact file
require_once(__ROOT__ . '/view/pages/user/ViewContact.php');

$contactView = new ViewContact();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        // Render the contact form
        echo $contactView->renderContactForm();
    ?>
    <?php include("hover_button.php"); ?>

</body>
</html>
