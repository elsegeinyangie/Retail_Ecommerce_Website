<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . "/../../config.php");
require_once(__DIR__ . "/../controller/CategoryController.php");
require_once(__DIR__ . "/../model/CategoryModel.php");

$model = new CategoryModel();
$controller = new CategoryController($model);

$action = $_POST['action'];

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'show': 
        // Code to display categories 
        $categories = $model->getCategories(); 
        echo json_encode($categories); 
        // Assuming getCategories returns an array of categories
         break;
    default:
        echo "Invalid action.";
        break;
}