<?php
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