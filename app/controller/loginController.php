<?php
// LoginController.php
require_once(__ROOT__ . "model/userModel.php");
require_once("loginContext.php");

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        echo "entered login function inside LoginController";
        // Get input data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate credentials
        $user = $this->userModel->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $context = new LoginContext();

            // Determine strategy based on email
            if (strpos($user['email'], 'admin') === 0) {
                $context->setStrategy(new AdminLoginStrategy());
            } else {
                $context->setStrategy(new CustomerLoginStrategy());
            }

            // Redirect user
            $context->redirectUser($user);
        } else {
            // Invalid credentials
            echo "Invalid email or password.";
        }
    }
}