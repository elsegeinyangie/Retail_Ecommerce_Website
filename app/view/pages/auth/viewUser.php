<?php

require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/view/view.php');
class ViewUser extends View {
    public function renderLoginForm() {
        return '
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%;">
                <div class="d-flex flex-column justify-content-center">
                    <h2 class="text-center mb-4">Login</h2>
                    <form id="loginForm" action="../../../controller/userController.php?action=login" method="POST" novalidate>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password here" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">Show</button>
                            </div>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <div class="mb-4 text-end">
                            <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="submit-btn">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Don\'t have an account? <a href="auth.php?action=signup" class="link">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>';
    }
    

    public function renderSignUpForm() {
        return '
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%; min-height: 700px;">
                <div class="d-flex flex-column justify-content-center">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <form id="signupForm" action="../../../controller/userController.php?action=signup" method="POST" novalidate>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                <div class="invalid-feedback" id="firstNameError"></div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                <div class="invalid-feedback" id="lastNameError"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                            <div class="invalid-feedback" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword1">Show</button>
                            </div>
                            <div class="invalid-feedback" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter password" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword2">Show</button>
                            </div>
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms">
                            <label class="form-check-label" for="terms">I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a></label>
                            <div class="invalid-feedback" id="termsError"></div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="submit-btn">Sign Up</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="auth.php?action=login" class="link">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>';
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
                        <form id="forgotPasswordForm" action="../../../controller/userController.php?action=resetPassword" method="POST">
                            <div class="mb-3">
                                <label for="forgot_email" class="form-label">Email address:</label>
                                <input type="email" class="form-control" id="forgot_email" name="forgot_email" placeholder="Enter your email" required>
                                <div class="invalid-feedback" id="forgotEmailError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                                <div class="invalid-feedback" id="newPasswordError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                                <div class="invalid-feedback" id="confirmPasswordError"></div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="submit-btn">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }


    function renderTermsAndConditionsModal() {
        echo '
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>1. Introduction</strong></p>
                        <p>Welcome to Eleva. By using our website, you agree to these Terms and Conditions,
                            and to our Privacy Policy.</p>
                        <p><strong>2. Account Registration</strong></p>
                        <p>When creating an account, you must provide accurate, complete, and current information at all
                            times.</p>
                        <p><strong>3. Use of Services</strong></p>
                        <p>You agree to use our services in a manner consistent with all applicable laws and regulations.</p>
                        <ul>
                            <li>Impersonating any person or entity</li>
                            <li>Infringing on the intellectual property of others</li>
                            <li>Posting false or misleading information</li>
                        </ul>
                        <p><strong>4. Limitation of Liability</strong></p>
                        <p>To the fullest extent permitted by law, we are not liable for any damages arising from your use
                            of our services.</p>
                        <p><strong>5. Changes to Terms</strong></p>
                        <p>We reserve the right to modify these Terms at any time.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    
}