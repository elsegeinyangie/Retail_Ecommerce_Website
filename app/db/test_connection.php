<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("dbh.php");

// Create an instance of the DBh class
$db = new DBh();

// Test the connection
if ($db->getConn()) {
    echo "Database connected successfully!";
} else {
    echo "Failed to connect to the database.";
}
?>