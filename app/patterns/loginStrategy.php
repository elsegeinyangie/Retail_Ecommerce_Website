<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
interface LoginStrategy {
    public function login($user);
}


class AdminLoginStrategy implements LoginStrategy {
    public function login($user) {
        // Logic for admin login
        $_SESSION['role'] = 'admin';
        $_SESSION['user_id'] = $user['id'];
   
        // Redirect to admin dashboard
        header("Location: /Retail_Ecommerce_Website/public/admin.php");
        exit();
    }
}

class CustomerLoginStrategy implements LoginStrategy {
    public function login($user) {
        // Logic for customer login
        $_SESSION['role'] = 'customer';
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['lastname'];
        $_SESSION['lastname'] = $user['lastname'];
        
        // Redirect to homepage
        // header("Location: /Retail_Ecommerce_Website/public/home_page.php");
        header("Location: /Retail_Ecommerce_Website/public/home_page.php");
    }
}


class LoginContext {
    private $strategy;

    public function setStrategy(LoginStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeLogin($user) {
        $this->strategy->login($user);
    }
}