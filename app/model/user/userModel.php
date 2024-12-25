<?php
require_once(__ROOT__ . "model/model.php");
require_once(__ROOT__ . "model/user.php");

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
        $result = $this->readUsers();
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

    function getUsers()
    {
        return $this->users;
    }

    function readUsers()
    {
        $sql = "SELECT * FROM user";

        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    function addUser($firstname, $lastname ,$email, $password, $role = "user", $address, $phone)
    {
        $sql = "INSERT INTO user (firstname, lastname email, password, role, address, phone) VALUES
        ('$firstname', '$lastname, '$email','$password', '$role', '$address', '$phone')";
        if ($this->db->query($sql) === true) {
            echo "Records inserted successfully.";
            $this->fillArray();
        } else {
            echo "ERROR: Could not able to execute $sql. " .  $this->connect()->error;;
        }
    }
    // UserModel.php
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user details as an associative array
        }
        return null; // User does not exist
    }

    public function updatePassword($email, $hashedPassword) {
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

}