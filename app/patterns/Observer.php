<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Subject Interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// Observer Interface
interface Observer {
    public function update($productName, $inventoryLevel);
}

// Concrete Subject: Product Inventory
class ProductInventory implements Subject {
    private $observers = [];
    private $products = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify() {
        foreach ($this->products as $productName => $inventoryLevel) {
            if ($inventoryLevel < 10) { // Threshold for low inventory
                foreach ($this->observers as $observer) {
                    $observer->update($productName, $inventoryLevel);
                }
            }
        }
    }

    public function updateInventory($productName, $inventoryLevel) {
        $this->products[$productName] = $inventoryLevel;
        $this->notify();
    }
}

// Concrete Observer: Admin Notification
class AdminNotification implements Observer {
    public function update($productName, $inventoryLevel) {
        $_SESSION['low_inventory'][] = [
            'product_name' => $productName,
            'inventory_level' => $inventoryLevel
        ];
    }
}