<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/model.php');
require_once('user.php');

class UserModel extends Model
{
    private $users;
    function __construct()
    {
        $this->fillArray();
    }

    function fillArray()
    {
        $this->users = array();
        $this->db = $this->connect();
        $result = $this->readAllUsers();
        while ($row = $result->fetch_assoc()) {
            array_push(
                $this->users,
                new User(
                    $row["user_id"],
                    $row["firstname"],
                    $row["lastname"],
                    $row["email"],
                    $row["password"],
                    $row["created_at"],
                    $row["role"],
                    $row["address"]
                )
            );
        }
    }

    function getAllUsers()
    {
        return $this->users;
    }

    function readAllUsers()
    {
        $sql = "SELECT * FROM users";

        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    function addUser($firstname, $lastname, $email, $password, $address, $phone) {
        $sql = "INSERT INTO users (firstname, lastname, email, password, address, phone) VALUES
        ('$firstname', '$lastname', '$email', '$password', '$address', '$phone')";
        if ($this->db->query($sql) === true) {
            echo "Records inserted successfully.<br>";
            $this->fillArray();
            return true;  // Return true to indicate success
        } else {
            echo "ERROR: Could not execute $sql. " . $this->db->error . "<br>";
            return false;  // Return false to indicate failure
        }
    }
    
     function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user details as an associative array
        }
        return null; // User does not exist
    }

    // function updatePassword($email, $hashedPassword) {
    //      $sql = "UPDATE users SET password = ? WHERE email = ?";
    //      $stmt = $this->db->prepare($sql); 
    //      if ($stmt) { 
    //         $stmt->bind_param('ss', $hashedPassword, $email);
    //          $result = $stmt->execute(); 
    //          $stmt->close(); 
    //          return $result; 
    //         } else { 
    //             error_log("Error preparing statement: " . $this->db->error); 
    //             return false; 
    //         } 
    //     }

    function updatePassword($email, $newPassword) {
         $query = "UPDATE users SET password = ? WHERE email = ?"; 
         $stmt = $this->db->prepare($query); 
         if ($stmt) { 
            $stmt->bind_param('ss', $newPassword, $email); 
             $result = $stmt->execute(); 
             $stmt->close(); 
             return $result; 
            } else { 
                error_log("Error preparing statement: " . $this->db->error); 
                return false; 
            } }
    
     function login($name, $password) {
        // SQL query to find a user by name
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
    
            // Verify the password (assuming password is hashed in the database)
            if (password_verify($password, $user['Password'])) {
                // Password matches, return user data or set a session
                // Optionally, you could start a session or create a token here
                return $user; // Successful login
            }
        }
        return false; // Invalid username or password
    }
    

}