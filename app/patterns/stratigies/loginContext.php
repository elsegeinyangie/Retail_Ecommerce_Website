<?php

require_once("adminLoginStrategy.php");
require_once("customerLoginStrategy.php");

class LoginContext {
    private $strategy;

    public function setStrategy(LoginStrategy $strategy) {
        echo "inside setStrategy function inside of loginContext.php";
        $this->strategy = $strategy;
    }

    public function redirectUser($user) {
        echo "inside redirectUser function inside loginContext.php";
        $this->strategy->executeLogin($user);
    }
}