<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("controller.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/user.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/userModel.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/patterns/loginStrategy.php");

class LoginController extends Controller {
    public function __construct($model) {
        parent::__construct($model);
        echo "LoginController Initialized<br>";
    }

    public function login($email, $password) {
        echo "Entered login function in LoginController with email: $email, password: $password<br>";

        // Fetch user data by email
        $user = $this->model->getUserByEmail($email);
        if (!$user) {
            echo "User not found<br>";
            return "User not found.";
        }

        // Check if the password matches
        if ($user['password'] !== $password) {
            echo "Incorrect password<br>";
            return "Incorrect password.";
        }

        // Create the context for login strategy
        $loginContext = new LoginContext();

        // Check if the email starts with 'admin'
        if (strpos($email, 'admin') === 0) {
            echo "Admin login strategy<br>";
            $loginContext->setStrategy(new AdminLoginStrategy());
        } else {
            echo "Customer login strategy<br>";
            $loginContext->setStrategy(new CustomerLoginStrategy());
        }

        // Execute login strategy
        $loginContext->executeLogin($user);

        echo "Login successful<br>";
        return "Login successful!";
    }

    public function handleLoginRequest() {
        echo "Entered handleLoginRequest function in LoginController<br>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Handling POST request<br>";
            $email = $_POST['email'];
            $password = $_POST['password'];
             $this->login($email, $password);  // Login logic

            // if ($message === "Login successful!") {
            //     echo "Redirecting to home page<br>";
            //     header("Location: /Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/public/home_page.php");  // Redirect to dashboard after successful login
            //     exit;
            // } else {
            //     echo "Login failed: $message<br>";
            //     return $message;  // Show error message
            // }
        }
    }
}