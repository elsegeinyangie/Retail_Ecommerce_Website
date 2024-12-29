document.addEventListener("DOMContentLoaded", () => {
    // Login Form Validation
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
      loginForm.addEventListener("submit", (event) => {
        event.preventDefault();
        let valid = true;
  
        const email = document.getElementById("email");
        const password = document.getElementById("password");
  
        if (!email.value.trim()) {
          email.classList.add("is-invalid");
          document.getElementById("emailError").textContent = "Email is required.";
          valid = false;
        } else if (!/\S+@\S+\.\S+/.test(email.value)) {
          email.classList.add("is-invalid");
          document.getElementById("emailError").textContent = "Invalid email format.";
          valid = false;
        } else {
          email.classList.remove("is-invalid");
        }
  
        if (!password.value.trim()) {
          password.classList.add("is-invalid");
          document.getElementById("passwordError").textContent = "Password is required.";
          valid = false;
        } else {
          password.classList.remove("is-invalid");
        }
  
        if (valid) loginForm.submit();
      });
    }
  
    // Sign Up Form Validation
    const signupForm = document.getElementById("signupForm");
    if (signupForm) {
      signupForm.addEventListener("submit", (event) => {
        event.preventDefault();
        let valid = true;
  
        const firstName = document.getElementById("firstName");
        const lastName = document.getElementById("lastName");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const terms = document.getElementById("terms");
  
        // Validate first name and last name
        if (!firstName.value.trim()) {
          firstName.classList.add("is-invalid");
          document.getElementById("firstNameError").textContent = "First name is required.";
          valid = false;
        } else {
          firstName.classList.remove("is-invalid");
        }
  
        if (!lastName.value.trim()) {
          lastName.classList.add("is-invalid");
          document.getElementById("lastNameError").textContent = "Last name is required.";
          valid = false;
        } else {
          lastName.classList.remove("is-invalid");
        }
  
        // Validate email
        if (!email.value.trim()) {
          email.classList.add("is-invalid");
          document.getElementById("emailError").textContent = "Email is required.";
          valid = false;
        } else if (!/\S+@\S+\.\S+/.test(email.value)) {
          email.classList.add("is-invalid");
          document.getElementById("emailError").textContent = "Invalid email format.";
          valid = false;
        } else {
          email.classList.remove("is-invalid");
        }
  
        // Validate password and confirm password
        if (password.value.length < 8) {
          password.classList.add("is-invalid");
          document.getElementById("passwordError").textContent = "Password must be at least 8 characters.";
          valid = false;
        } else {
          password.classList.remove("is-invalid");
        }
  
        if (password.value !== confirmPassword.value) {
          confirmPassword.classList.add("is-invalid");
          document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
          valid = false;
        } else {
          confirmPassword.classList.remove("is-invalid");
        }
  
        // Validate terms
        if (!terms.checked) {
          terms.classList.add("is-invalid");
          document.getElementById("termsError").textContent = "You must agree to the terms.";
          valid = false;
        } else {
          terms.classList.remove("is-invalid");
        }
  
        if (valid) signupForm.submit();
      });
    }
  
    // Toggle Password Visibility
    const togglePasswordButtons = document.querySelectorAll("[id^='togglePassword']");
    togglePasswordButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const input = button.previousElementSibling;
        const icon = button.querySelector("i");
        if (input.type === "password") {
          input.type = "text";
          icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          input.type = "password";
          icon.classList.replace("fa-eye-slash", "fa-eye");
        }
      });
    });
  });
  