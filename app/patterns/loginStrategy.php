<?php
interface LoginStrategy {
    public function login($user);
}


class AdminLoginStrategy implements LoginStrategy {
    public function login($user) {
        // Logic for admin login
        $_SESSION['role'] = 'admin';
        $_SESSION['user_id'] = $user['id'];
   
        // Redirect to admin dashboard
        header("Location: ../../view/pages/admin/viewAdminDashboard.php");
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
        header("Location: ../../view/pages/user/ViewHome.php");
        exit();
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