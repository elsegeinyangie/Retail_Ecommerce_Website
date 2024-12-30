<?php
class ViewNavbar {
    private $activePage;

    // Constructor to set the active page
    public function __construct($activePage = 'index.php') {
        $this->activePage = $activePage;
    }

    // Method to render the navbar
    public function renderNavbar() {
        return '
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: var(--bg-color-secondary);">
            <div class="container">
                <a class="navbar-brand" href="index.php" style="color: white;"><strong>Eleva</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php" ' . $this->isActive('ViewHome.php') . '>Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="shopping_cart.php" ' . $this->isActive('shopping_cart.php') . '>Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="customer_and_help.php" ' . $this->isActive('ViewContact.php') . '>Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="wishlist.php" ' . $this->isActive('wishlist.php') . '>Wishlist</a></li>
                    </ul>
                    <form class="d-flex me-3" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="btn btn-outline-success searchbtn" type="submit">Search</button>
                    </form>
                    ' . $this->renderUserMenu() . '
                    <div class="cart-container nav-item">
                        <span class="cart-icon" onclick="openCartSidebar()">
                            <i class="bi bi-cart"></i>
                            <span class="cart-count" id="cartCount">0</span>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
        <style>
            :root {
                --primary-color: #071739;
                --secondary-color: #4b6382;
                --accent-color-1: #A68868;
                --accent-color-2: #E3C39D;
                --bg-color-light: #CDD5DB;
                --bg-color-secondary: #A4B5C4;
                --text-light: white;
                --text-dark: #071739;
            }

            .navbar {
                background-color: var(--primary-color);
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 20px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }

            .navbar-logo a {
                text-decoration: none;
                font-size: 1.5rem;
                font-weight: bold;
                color: var(--accent-color-2);
                transition: color 0.3s;
            }

            .navbar-logo a:hover {
                color: var(--accent-color-1);
            }

            .navbar-links {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
                gap: 20px;
            }

            .navbar-links li {
                display: inline;
            }

            .navbar-links a {
                text-decoration: none;
                color: var(--text-light);
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }

            .navbar-links a.active {
                background-color: var(--secondary-color);
                color: var(--accent-color-2);
                font-weight: bold;
            }

            .navbar-links a:hover {
                background-color: var(--accent-color-1);
                color: var(--text-light);
            }

            .navbar-login a {
                text-decoration: none;
                color: var(--accent-color-2);
                font-size: 1rem;
                padding: 10px 20px;
                border-radius: 5px;
                background-color: var(--secondary-color);
                transition: background-color 0.3s, color 0.3s;
            }

            .navbar-login a:hover {
                background-color: var(--accent-color-1);
                color: var(--text-light);
            }

            .cart-icon {
                font-size: 1.5rem;
                cursor: pointer;
                position: relative;
            }

            .cart-count {
                background-color: red;
                color: var(--text-light);
                border-radius: 50%;
                padding: 2px 6px;
                font-size: 0.8rem;
                position: absolute;
                top: -5px;
                right: -10px;
            }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                console.log("Navbar loaded");
            });
        </script>';
    }

    // Method to check if the current page is active
    private function isActive($page) {
        return $this->activePage === $page ? 'class="active"' : '';
    }

    // Method to render user menu if logged in
    private function renderUserMenu() {
        if (!empty($_SESSION['ID'])) {
            return '
                <div class="dropdown ms-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i> ' . htmlspecialchars($_SESSION['firstName']) . '
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="viewuserprofile.php">View Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="sign_out.php">Sign Out</a></li>
                    </ul>
                </div>';
        } else {
            return '<a class="nav-link nav-item" href="/Retail_Ecommerce_Website/public/auth.php?action=login">Login</a>';
        }
    }
}
?>