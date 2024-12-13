<?php
require_once(__ROOT__ . "model/model.php");
require_once(__ROOT__ . "payments.php");

class PaymentsModel extends Model {
	private $payments; 

    function __construct() {
        $this->fillArray(); // Populate the payments array on initialization
    }

    function fillArray() {
        $this->payments = array(); // Initialize the payments array
        $this->db = $this->connect(); // Database connection
        $result = $this->readPayments(); // Get payments from the database
        while ($row = $result->fetch_assoc()) {
            // Assuming payments class has a constructor matching the table columns
            array_push($this->payments, new payment(
                $row["product_id"],
                $row["category_id"],
                $row["product_name"],
                $row["product_description"],
                $row["product_price"],
                $row["stock_quantity"],
                $row["created_at"],
                $row["product_image"]
            ));
        }
    }

    function getPayments() {
        return $this->payments; // Return the payments array
    }

    function readPayments() {
        // SQL query to select all payments from the payments table
        $sql = "SELECT * FROM payments";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result; // Return the result set if there are payments
        } else {
            return false; // Return false if no payments are found
        }
    }

    function addProduct($productName, $productDescription, $productPrice, $stockQuantity, $productImage) {
        // SQL query to insert a new product into the payments table
        $sql = "INSERT INTO payments (product_name, product_description, product_price, stock_quantity, product_image) 
                VALUES ('$product_name', '$product_description', '$product_price', '$stock_quantity', '$product_image')";
        if ($this->db->query($sql) === true) {
            echo "payments inserted successfully.";
            $this->fillArray(); // Refresh the payments array
        } else {
            echo "ERROR: Could not execute $sql. " . $this->db->error;
        }
    }
}