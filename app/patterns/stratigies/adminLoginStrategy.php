<?php

require_once('loginStrategy.php');


class AdminLoginStrategy implements LoginStrategy {
    public function executeLogin($user) {
        echo "inside executeLogin function inside AdminLoginStrategy.php";
        header("Location: ../../view/pages/admin/viewAdminDashboard.php");
        exit();
    }
}