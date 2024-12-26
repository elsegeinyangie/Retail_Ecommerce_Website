<?php

require_once( "controller.php");
require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/user.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/model/user/userModel.php');
require_once('/Applications/XAMPP/xamppfiles/htdocs/Retail_Ecommerce_Website/app/patterns/loginStrategy.php');

class UserController extends Controller {

	
	public function signup() {
		$firstname = $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$role = $_REQUEST['role'];
		$address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];

		// Check if the user already exists by email
		$user = $this->model->getUserByEmail($email);
		
		if ($user) {
			return "User with this email already exists.";
		}
	
		// Add new user if email is unique
		$result = $this->model->addUser($firstname, $lastname ,$email, $password, $address, $phone, $role);
		
		if ($result) {
			return "User successfully registered!";
		} else {
			return "There was an error registering the user.";
		}
	}


	public function edit() {
		$firstname = $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
        $address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];

		$this->model->editUser($firstname, $lastname, $email, $password, $address, $phone);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}
		

	public function login($email, $password) {
	
		// Fetch user data by email
		$user = $this->model->getUserByEmail($email);
		
		if (!$user) {
			return "User not found.";
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
	}
	
}
?>