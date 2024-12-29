<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    if (!enum_exists('Role')) {
        enum Role: string {
            case Customer = 'customer';
            case Admin = 'admin';
        }
    
        enum PaymentMethod: string {
            case Cash = 'cash';
            case Fawry = 'fawry';
            case CreditCard = 'credit';
            case DebitCard = 'debit';
        }
    
        enum OrderStatus: string {
            case Pending = 'pending';
            case Shipped = 'shipped';
            case Delivered = 'delivered';
        }
    }