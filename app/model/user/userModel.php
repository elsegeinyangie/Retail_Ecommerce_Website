<?php


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

    function addUser($firstname, $lastname ,$email, $password, $address, $phone, $role = "user",)
    {
        $sql = "INSERT INTO users (firstname, lastname email, password, role, address, phone) VALUES
        ('$firstname', '$lastname, '$email','$password', '$role', '$address', '$phone')";
        if ($this->db->query($sql) === true) {
            echo "Records inserted successfully.";
            $this->fillArray();
        } else {
            echo "ERROR: Could not able to execute $sql. " .  $this->connect()->error;;
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

     function updatePassword($email, $hashedPassword) {
        $query = "UPDATE users SET password = :password WHERE email = :email";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log the error for debugging purposes
            error_log("Error updating password: " . $e->getMessage());
            return false;
        }
    }

     function login($name, $password) {
        // SQL query to find a user by name
        $sql = "SELECT * FROM users WHERE Name = ?";
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