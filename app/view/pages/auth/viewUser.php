<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/view/view.php');
class ViewUser  {
    protected $controller; 
    protected $model;
     public function __construct($controller, $model) { $this->controller = $controller; $this->model = $model; }
     
     
    public function renderLoginForm() {
        return '
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%;">
                <div class="d-flex flex-column justify-content-center">
                    <h2 class="text-center mb-4">Login</h2>
                    <form id="loginForm" action="/Retail_Ecommerce_Website/public/auth.php?action=login" method="POST" novalidate>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password here" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <div class="mb-4 text-end">
                            <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="submit-btn" name="login">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Don\'t have an account? <a href="auth.php?action=signup" class="link">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
            <script>
                document.getElementById("loginForm").addEventListener("submit", function(event) {
                    let valid = true;
                    const email = document.getElementById("email");
                    const password = document.getElementById("password");

                    // Reset previous errors
                    email.classList.remove("is-invalid");
                    password.classList.remove("is-invalid");

                    // Email validation
                    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                    if (!email.value.match(emailPattern)) {
                        email.classList.add("is-invalid");
                        document.getElementById("emailError").textContent = "Please enter a valid email address.";
                        valid = false;
                    }

                    // Password validation
                    if (password.value.length < 6) {
                        password.classList.add("is-invalid");
                        document.getElementById("passwordError").textContent = "Password must be at least 6 characters long.";
                        valid = false;
                    }

                    if (!valid) {
                        event.preventDefault();
                    }
                });

                // Toggle password visibility
                document.getElementById("togglePassword").addEventListener("click", function() {
                    const passwordField = document.getElementById("password");
                    const icon = this.querySelector("i");
                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    } else {
                        passwordField.type = "password";
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    }
                });
            </script>';
    }

    public function renderSignUpForm() {
        return '
        <div class="container d-flex justify-content-center align-items-center flex-grow-1 overflow-x: hidden;">
            <div class="card p-4 shadow-sm" style="max-width: 750px; width: 100%; height: 650px; max-height: 80vh; overflow-y: auto;">
                <div class="d-flex flex-column justify-content-center" style="height: 100%; overflow-y: auto;">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <form id="signupForm" action="/Retail_Ecommerce_Website/public/auth.php?action=signup" method="POST"  novalidate style="height: 100%; overflow-y: auto;">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                                <div class="invalid-feedback" id="firstNameError"></div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                                <div class="invalid-feedback" id="lastNameError"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Your address" required>
                            <div class="invalid-feedback" id="addressError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your phone number" required>
                            <div class="invalid-feedback" id="phoneError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter password" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword2">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms">
                            <label class="form-check-label" for="terms">I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a></label>
                            <div class="invalid-feedback" id="termsError"></div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="submit-btn" name="signup">Sign Up</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="auth.php?action=login" class="link">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("signupForm").addEventListener("submit", function(event) {
                let valid = true;
                const firstname = document.getElementById("firstname");
                const lastname = document.getElementById("lastname");
                const email = document.getElementById("email");
                const address = document.getElementById("address");
                const phone = document.getElementById("phone");
                const password = document.getElementById("password");
                const confirmPassword = document.getElementById("confirmPassword");
    
                // Reset previous errors
                firstname.classList.remove("is-invalid");
                lastname.classList.remove("is-invalid");
                email.classList.remove("is-invalid");
                address.classList.remove("is-invalid");
                phone.classList.remove("is-invalid");
                password.classList.remove("is-invalid");
                confirmPassword.classList.remove("is-invalid");
    
                // Email validation
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email.value.match(emailPattern)) {
                    email.classList.add("is-invalid");
                    document.getElementById("emailError").textContent = "Please enter a valid email address.";
                    valid = false;
                }
    
                // Password validation
                if (password.value.length < 6) {
                    password.classList.add("is-invalid");
                    document.getElementById("passwordError").textContent = "Password must be at least 6 characters long.";
                    valid = false;
                }
    
                // Confirm Password validation
                if (password.value !== confirmPassword.value) {
                    confirmPassword.classList.add("is-invalid");
                    document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
                    valid = false;
                }
    
                // Terms validation
                const terms = document.getElementById("terms");
                if (!terms.checked) {
                    document.getElementById("termsError").textContent = "You must agree to the terms and conditions.";
                    valid = false;
                }
    
                if (!valid) {
                    event.preventDefault();
                }
            });
    
            // Toggle password visibility
            document.getElementById("togglePassword1").addEventListener("click", function() {
                const passwordField = document.getElementById("password");
                const icon = this.querySelector("i");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
    
            document.getElementById("togglePassword2").addEventListener("click", function() {
                const confirmPasswordField = document.getElementById("confirmPassword");
                const icon = this.querySelector("i");
                if (confirmPasswordField.type === "password") {
                    confirmPasswordField.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    confirmPasswordField.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        </script>';
    }
    
    public function renderForgotPasswordModal() {
        return '
        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="forgotPasswordForm" action="/Retail_Ecommerce_Website/public/auth.php?action=resetPassword" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password" required>
                                <div class="invalid-feedback" id="newPasswordError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                                <div class="invalid-feedback" id="confirmPasswordError"></div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="submit-btn" name="resetPassword">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }

    public function renderTermsAndConditionsModal() {
        return '
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Introduction</h6>
                        <p>Welcome to our website. By using our services, you agree to the following terms and conditions. Please read them carefully.</p>
                        <h6>Use of Services</h6>
                        <p>Our services are provided to you for personal, non-commercial use only. You agree not to misuse our services or access them in a way that could harm or disable the services.</p>
                        <h6>Privacy</h6>
                        <p>We value your privacy. Please review our <a href="#">Privacy Policy</a> for details on how we handle your personal data.</p>
                        <h6>Account Responsibility</h6>
                        <p>You are responsible for maintaining the confidentiality of your account and password. You agree to notify us immediately of any unauthorized use of your account.</p>
                        <h6>Termination</h6>
                        <p>We reserve the right to terminate your access to our services if you violate any of these terms and conditions.</p>
                        <h6>Limitation of Liability</h6>
                        <p>We are not liable for any damages arising from the use or inability to use our services.</p>
                        <h6>Changes to the Terms</h6>
                        <p>We may update these terms from time to time. Any changes will be posted on this page, and by continuing to use our services, you agree to the updated terms.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    
}