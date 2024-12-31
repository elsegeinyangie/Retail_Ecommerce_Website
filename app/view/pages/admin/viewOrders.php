<?php
// Enable error reporting for debugging purposes
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// Include necessary files
require_once '../../pages/admin/ViewAdminComponents.php';
require_once '../../../model/orders/ordersModel.php';
require_once '../../../controller/orderController.php';

// Instantiate the components and classes
$viewAdmin = new ViewAdminComponents();
$orderModel = new OrdersModel();
$orderController = new OrderController($orderModel);

// Fetch order data from the controller
$orders = $orderController->getAllOrderItems();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>View Orders</title>
</head>
<body>
    <!-- Render Admin Header -->
    <?php echo $viewAdmin->renderAdminHeader(); ?>

    <!-- Render Sidebar -->
    <?php echo $viewAdmin->renderSidebar(); ?>

    <div class="main-content" id="main-content">
        <h2>Orders</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $index => $order): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                            <td>
                                <button onclick="updateOrderStatus(<?php echo $order['order_id']; ?>)">Update Status</button>
                                <button onclick="deleteOrder(<?php echo $order['order_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateOrderStatus(orderId) {
            if (confirm('Are you sure you want to update the status of this order?')) {
                $.ajax({
                    url: '../../../controller/OrderController.php',
                    method: 'POST',
                    data: { action: 'updateStatus', order_id: orderId },
                    success: function(response) {
                        alert('Order status updated successfully.');
                        location.reload();
                    },
                    error: function() {
                        alert('Failed to update order status.');
                    }
                });
            }
        }

        function deleteOrder(orderId) {
            if (confirm('Are you sure you want to delete this order?')) {
                $.ajax({
                    url: '../../../controller/OrderController.php',
                    method: 'POST',
                    data: { action: 'delete', order_id: orderId },
                    success: function(response) {
                        alert('Order deleted successfully.');
                        location.reload();
                    },
                    error: function() {
                        alert('Failed to delete order.');
                    }
                });
            }
        }
    </script>
</body>
</html>
