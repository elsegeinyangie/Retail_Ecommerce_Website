<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="registration_styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid registration-navbar text-center">
        <h2 class="registration-navbar-logo">Eleva</h2>
        <h6 class="registration-navbar-slogan">Choose Your Products</h6>
    </div>

    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%;">
            <div class="d-flex flex-column justify-content-center">
                <h2 class="text-center mb-4">Login</h2>
                <form id="loginForm" action="../../../controller/loginController.php?action=login" method="POST"
                    novalidate>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com"
                            required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password here" required>
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">Show</button>
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                    <div class="mb-4 text-end">
                        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot
                            Password?</a>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="submit-btn">Login</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p>Don't have an account? <a href="viewSignUp.php" class="link">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="forgotPasswordForm" action="../../../controller/loginController.php?action=login"
                        method="POST">
                        <div class="mb-3">
                            <label for="forgot_email" class="form-label">Email address:</label>
                            <input type="email" class="form-control" id="forgot_email" name="forgot_email"
                                placeholder="Enter your email" required>
                            <div class="invalid-feedback" id="forgotEmailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                placeholder="Enter new password" required>
                            <div class="invalid-feedback" id="newPasswordError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confirm new password" required>
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="submit-btn">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="registration-footer mt-auto py-3">
        <div class="container text-center">
            <span>Copyright @ 2024 Eleva</span>
        </div>
    </footer>

    <script src="assets/js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>