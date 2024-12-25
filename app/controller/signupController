<?php
class SignupController {
    public function signup() {
        // Retrieve input from POST request
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Input validation
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword) || empty($address) || empty($phone)) {
            header("Location: /signup?error=empty_fields");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /signup?error=invalid_email");
            exit();
        }

        if ($password !== $confirmPassword) {
            header("Location: /signup?error=password_mismatch");
            exit();
        }

        // Initialize the UserModel
        $userModel = new UserModel();

        // Check if user already exists
        $existingUser = $userModel->getUserByEmail($email);
        if ($existingUser) {
            header("Location: /signup?error=user_exists");
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Default role for new users
        $role = 'user';

        // Add user to the database
        try {
            $userModel->addUser($firstname, $lastname, $email, $hashedPassword, $role, $address, $phone);
            header("Location: /login?success=signup_complete");
        } catch (Exception $e) {
            header("Location: /signup?error=server_error");
        }
        exit();
    }
}