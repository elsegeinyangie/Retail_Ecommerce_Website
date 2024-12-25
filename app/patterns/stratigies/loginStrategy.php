<?php

interface LoginStrategy {
    public function executeLogin($user);
}