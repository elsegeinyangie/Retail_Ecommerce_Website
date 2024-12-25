<?php
require_once('../../db/Dbh.php');
require_once('loginStrategy.php');

class CustomerLoginStrategy implements LoginStrategy {
    public function executeLogin($user) {
        echo "inside executeLogin function inside CustomerLoginStrategy.php";
        header("Location: ../../view/pages/user/home_page.php");
        exit();
    }
}