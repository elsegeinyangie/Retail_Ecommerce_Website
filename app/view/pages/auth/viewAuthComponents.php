<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class ViewAuthComponents {
    public function renderAuthNavbar() {
        return '
        <div class="container-fluid registration-navbar text-center">
            <h2 class="registration-navbar-logo">Eleva</h2>
            <h6 class="registration-navbar-slogan">Choose Your Products</h6>
        </div>';
    }

    public function renderAuthFooter() {
        return '
        <footer class="registration-footer mt-auto py-3">
            <div class="container text-center">
                <span>Copyright @ 2024 Eleva</span>
            </div>
        </footer>';
    }
}