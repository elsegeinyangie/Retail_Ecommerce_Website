<?php

class ViewSignUp {
    public function renderSignUpForm() {
        return '
        <div class="container d-flex justify-content-center align-items-center flex-grow-1">
            <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%; min-height: 700px;">
                <div class="d-flex flex-column justify-content-center">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <form id="signupForm" action="../controllers/SignupController.php" method="POST" novalidate>
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
                        <p>Already have an account? <a href="viewLogin.php" class="link">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>';
    }
}

?>