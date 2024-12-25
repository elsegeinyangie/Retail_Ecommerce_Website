document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    const forgotPasswordForm = document.getElementById("forgotPasswordForm");
    const togglePassword = document.getElementById("togglePassword");

    // Toggle password visibility
    togglePassword.addEventListener("click", () => {
        const passwordInput = document.getElementById("password");
        const isPasswordVisible = passwordInput.type === "text";
        passwordInput.type = isPasswordVisible ? "password" : "text";
        togglePassword.textContent = isPasswordVisible ? "Show" : "Hide";
    });

    // Login form validation
    loginForm.addEventListener("submit", (e) => {
        let valid = true;

        // Email validation
        const email = document.getElementById("email");
        const emailError = document.getElementById("emailError");
        if (!email.value || !/\S+@\S+\.\S+/.test(email.value)) {
            emailError.textContent = "Please enter a valid email.";
            valid = false;
        } else {
            emailError.textContent = "";
        }

        // Password validation
        const password = document.getElementById("password");
        const passwordError = document.getElementById("passwordError");
        if (!password.value || password.value.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters.";
            valid = false;
        } else {
            passwordError.textContent = "";
        }

        if (!valid) e.preventDefault();
    });

    // Forgot password form validation
    forgotPasswordForm.addEventListener("submit", (e) => {
        let valid = true;

        // Email validation
        const forgotEmail = document.getElementById("forgot_email");
        const forgotEmailError = document.getElementById("forgotEmailError");
        if (!forgotEmail.value || !/\S+@\S+\.\S+/.test(forgotEmail.value)) {
            forgotEmailError.textContent = "Please enter a valid email.";
            valid = false;
        } else {
            forgotEmailError.textContent = "";
        }

        // New password validation
        const newPassword = document.getElementById("new_password");
        const confirmPassword = document.getElementById("confirm_password");
        const newPasswordError = document.getElementById("newPasswordError");
        const confirmPasswordError = document.getElementById("confirmPasswordError");
        if (!newPassword.value || newPassword.value.length < 8) {
            newPasswordError.textContent = "Password must be at least 8 characters.";
            valid = false;
        } else {
            newPasswordError.textContent = "";
        }

        if (newPassword.value !== confirmPassword.value) {
            confirmPasswordError.textContent = "Passwords do not match.";
            valid = false;
        } else {
            confirmPasswordError.textContent = "";
        }

        if (!valid) e.preventDefault();
    });
});
