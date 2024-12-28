<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
abstract class Controller
{
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }
}
?>