<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("controller.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/user.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/userModel.php");
require_once("/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/patterns/loginStrategy.php");

class UserController extends Controller
{

	public function __construct($model)
	{
		parent::__construct($model);
	}

	public function signup($firstname, $lastname, $email, $password, $address, $phone)
	{
		// Check if the user already exists by email
		$user = $this->model->getUserByEmail($email);

		if ($user) {
			return "User with this email already exists.";
		}

		// Add new user if email is unique
		$result = $this->model->addUser($firstname, $lastname, $email, $password, $address, $phone);

		if ($result) {
			header('Location: /Retail_Ecommerce_Website/public/auth.php?action=login');
			exit();
		} else {
			return "There was an error registering the user.";
		}
	}

	public function edit($firstname, $lastname, $email, $password, $address, $phone)
	{

		$this->model->editUser($firstname, $lastname, $email, $password, $address, $phone);
	}

	public function delete()
	{

		$this->model->deleteUser();
	}

	public function login($email, $password)
	{
		// Fetch user data by email
		$user = $this->model->getUserByEmail($email);

		if (!$user) {
			return "User not found.";
		}

		// Check if the password matches
		if ($user['password'] !== $password) {
			return "Incorrect password.";
		}

		// Create the context for login strategy
		$loginContext = new LoginContext();

		// Check if the email starts with 'admin'
		if (strpos($email, 'admin') === 0) {
			// Admin login strategy
			$loginContext->setStrategy(new AdminLoginStrategy());
		} else {
			// Customer login strategy
			$loginContext->setStrategy(new CustomerLoginStrategy());
		}

		// Execute login strategy
		$loginContext->executeLogin($user);

		// Return success message (add a redirect or session setting for real use)
		return "Login successful!";
	}


	// public function resetPassword($email, $newPassword) {
	// 	$user = $this->model->getUserByEmail($email); 
	// 	if (!$user) { 
	// 		return "User not found."; 
	// 	}
	// 	$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); 
	// 	 $result = $this->model->updatePassword($email, $hashedPassword); 
	// 	 if ($result) { 
	// 		return "Password reset successfully.";
	// 		header('Location: /Retail_Ecommerce_Website/public/auth.php?action=login');
	// 	} else { 
	// 		return "There was an error resetting the password."; 
	// 	}
	// }

	public function resetPassword($email, $newPassword) {
		$user = $this->model->getUserByEmail($email);
		if (!$user) {
			return "User not found.";
		}
	
		// Update the user's password without hashing
		$result = $this->model->updatePassword($email, $newPassword);
		if ($result) {
			// Show success message and redirect to login page
			header('Location: /Retail_Ecommerce_Website/public/auth.php?action=login');
			exit();
		} else {
			return "There was an error resetting the password.";
		}
	}
	
	public function handleRequest()
	{

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['login'])) {
				// Handle login form submission
				$email = $_POST['email'];
				$password = $_POST['password'];
				$this->login($email, $password);  // Login logic

				// if ($message === "Login successful!") {
				//     header("Location: /Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/public/home_page.php");  // Redirect to dashboard after successful login
				//     exit;
				// } else {
				//     return $message;  // Show error message
				// }

			} elseif (isset($_POST['signup'])) {
				// Handle signup form submission
				$firstname = $_POST["firstname"];
				$lastname = $_POST["lastname"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$address = $_POST["address"];
				$phone = $_POST["phone"];

				$this->signup($firstname, $lastname, $email, $password, $address, $phone);  // Signup logic
			} elseif (isset($_POST['resetPassword'])) {
				$email = $_POST['email'];
				$newPassword = $_POST['newPassword'];
				$message = $this->resetPassword($email, $newPassword);
			}
		}
	}
}