<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the Model class is already declared to avoid redeclaration
if (!class_exists('Model')) {
    require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/db/DBh.php");

    abstract class Model {
        protected $db;
        protected $conn;

        public function connect() {
            if (null === $this->conn) {
                $this->db = new Dbh();
                $this->conn = $this->db->getConn();
            }
            return $this->db;
        }
    }
}