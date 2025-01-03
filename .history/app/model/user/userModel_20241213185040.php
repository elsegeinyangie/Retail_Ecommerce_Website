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
        $sql = "INSERT INTO user (firstname, lastname email, password,role, address, phone) VALUES
        ('$firstname', '$lastname, '$email','$password', Date(), '$role', '$address', '$phone')";
        if ($this->db->query($sql) === true) {
            echo "Records inserted successfully.";
            $this->fillArray();
        } else {
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
    }
}