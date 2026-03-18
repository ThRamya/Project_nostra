<?php
session_start();
include('db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch all orders and their items
$sql = "SELECT o.order_id, o.order_status, o.order_date,
               p.product_name, p.price, oi.quantity
        FROM orders o
        JOIN order_items oi ON o.order_id = oi.order_id
        JOIN products p ON oi.product_id = p.id
        WHERE o.user_id = $user_id
        ORDER BY o.order_date DESC";

$result = mysqli_query($conn, $sql);

// To calculate total per order
$order_totals = [];
while($row_temp = mysqli_fetch_assoc($result)) {
    $order_totals[$row_temp['order_id']][] = $row_temp;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/N_n.jpg">
    <style>
        .orders-container{
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td{
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th{
            background: #f4f4f4;
        }
        .status-Pending{
            color: #f59e0b;
            font-weight: bold;
        }
        .status-Delivered{
            color: #10b981;
            font-weight: bold;
        }
        .order-total{
            text-align: right;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="orders-container">
    <h2>My Orders</h2>

    <?php foreach($order_totals as $order_id => $items): ?>
        <table>
            <tr>
                <th colspan="6">Order ID: <?= $order_id ?> | Status: 
                    <span class="status-<?= $items[0]['order_status'] ?>">
                        <?= $items[0]['order_status'] ?>
                   </span> 
                    | Date: <?= $items[0]['order_date'] ?>
                </th>
            </tr>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach($items as $row): ?>
                <?php $subtotal = $row['price'] * $row['quantity']; ?>
                <?php $total += $subtotal; ?>
                <tr>
                    <td><?= $row['product_name'] ?></td>
                    <td>₹<?= number_format($row['price'],2) ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td>₹<?= number_format($subtotal,2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" class="order-total">Total</td>
                <td class="order-total">₹<?= number_format($total,2) ?></td>
            </tr>
        </table>
    <?php endforeach; ?>

    <?php if(empty($order_totals)): ?>
        <p style="text-align:center;">You have not placed any orders yet.</p>
    <?php endif; ?>
</div>
</body>
</html>