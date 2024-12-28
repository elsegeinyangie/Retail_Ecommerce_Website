<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/enums.php');
require_once ('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/model.php');



if (!class_exists('User')) {
  class User extends Model
{
  private $user_id;
  private $firstname;
  private $lastname;
  private $email;
  private $password;
  private $created_at;
  private Role $role;
  private $address;
  private $phone;


  function __construct($id, $firstname = "", $lastname = "", $email = "", $password = "", $role = "customer", $address = "", $phone="")
  {
    $this->user_id = $id;
    $this->db = $this->connect();
  
    if ("" === $firstname) {
      $this->readUser($id);
    } else {
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->email = $email;
      $this->password = $password;
      $this->created_at = date("Y-m-d H:i:s");
      $this->role = $role === "customer" ? Role::Customer : Role::Admin; // This is the specific line for the role assignment      $this->address = $address;
      $this->phone = $phone;
    }
  }

  function getFirstName()
  {
    return $this->firstname;
  }
  function setFirstName($firstname)
  {
    return $this->firstname = $firstname;
  }

  function getLastName()
  {
    return $this->lastname;
  }
  function setLastName($lastname)
  {
    return $this->lastname = $lastname;
  }

  function getEmail()
  {
    return $this->email;
  }

  function setEmail($email)
  {
    return $this->email = $email;
  }
  function getPassword()
  {
    return $this->password;
  }

  function setPassword($password)
  {
    return $this->password = $password;
  }

  function getCreatedAt()
  {
    return $this->created_at;
  }
  function setCreatedAt($created_at)
  {
    return $this->created_at = date("Y-m-d H:i:s");
  }

  function getRole()
  {
    return $this->role;
  }
  function setRole($role)
  {
    return $this->role = $role;
  }

  function getPhone()
  {
    return $this->phone;
  }
  function setPhone($phone)
  {
    return $this->phone = $phone;
  }
  function getAddress()
  {
    return $this->address;
  }
  function setAddress($address)
  {
    return $this->address = $address;
  }

  function getID()
  {
    return $this->user_id;
  }
  



  function readUser($id)
  {
    $sql = "SELECT * FROM users where user_id=" . $id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc(); // Use $result to fetch the associative array      $this->firstname = $row["firstname"];
      $this->lastname = $row["lastname"];
      $_SESSION["firstname"] = $row["firstname"];
      $this->email = $row["email"];
      $this->password = $row["password"];
      $this->created_at = $row["created_at"];
      $this->role = $row["role"] === "customer" ? Role::Customer : Role::Admin; // This is the specific line for the role assignment      $this->address = $row["address"];
      $this->phone = $row["phone"];
    } else {
      $this->firstname = "";
      $this->lastname = "";
      $this->email = "";
      $this->password = "";
      $this->created_at = date("Y-m-d H:i:s");
      $this->role = Role::Customer; // Default role
            $this->address = "";
      $this->phone = "";
    }
  }

  function editUser($firstname, $lastname, $email, $password, $address, $phone)
  {
    $sql = "update users set firstname='$firstname', lastname='$lastname', email='$email', password='$password', address='$address', phone='$phone' where user_id=$this->user_id;";
    if ($this->db->query($sql) === true) {
      echo "updated successfully.";
      $this->readUser($this->user_id);
    } else {
      echo "ERROR: Could not able to execute $sql. " .  $this->connect()->error;
    }
  }

  function deleteUser()
  {
    $sql = "delete from users where id=$this->user_id;";
    if ($this->db->query($sql) === true) {
      echo "deletet successfully.";
    } else {
      echo "ERROR: Could not able to execute $sql. " .  $this->connect()->error;
    }
  }
}
}