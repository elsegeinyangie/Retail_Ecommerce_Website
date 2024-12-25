<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="registration_styles.css">
    <script src="validation.js" defer></script>
    <style>
    .signup-card {
        max-width: 600px;
        width: 100%;
        min-height: 700px;
        padding: 2rem;
    }

    .password-input {
        display: flex;
        align-items: center;
    }

    .password-input input {
        flex: 1;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid registration-navbar text-center">
        <h2 class="registration-navbar-logo">Eleva</h2>
        <h6 class="registration-navbar-slogan">Choose Your Products</h6>
    </div>
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card signup-card shadow-sm">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form id="signupForm" action="../controllers/SignupController.php" method="POST" novalidate>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                            required>
                        <div class="invalid-feedback" id="firstNameError"></div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                            required>
                        <div class="invalid-feedback" id="lastNameError"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com"
                        required>
                    <div class="invalid-feedback" id="emailError"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <div class="password-input">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter password" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword1">Show</button>
                    </div>
                    <div class="invalid-feedback" id="passwordError"></div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password:</label>
                    <div class="password-input">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Re-enter password" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword2">Show</button>
                    </div>
                    <div class="invalid-feedback" id="confirmPasswordError"></div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms">
                    <label class="form-check-label" for="terms">I agree to the <a href="#" data-bs-toggle="modal"
                            data-bs-target="#termsModal">Terms and Conditions</a></label>
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
    <footer class="registration-footer mt-auto py-3">
        <div class="container text-center">
            <span>Copyright © 2024 Eleva</span>
        </div>
    </footer>
</body>

</html>