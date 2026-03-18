<?php
session_start();
include("db.php");

if(!isset($_GET['order_id'])){
    header("Location: index.php");
    exit();
}

$order_id = intval($_GET['order_id']);

// Fetch order info
$order_sql = "SELECT o.order_id, o.total_price, o.order_date, u.username
              FROM orders o
              JOIN users u ON o.user_id = u.user_id
              WHERE o.order_id = $order_id";
$order_res = mysqli_query($conn, $order_sql);
$order = mysqli_fetch_assoc($order_res);

// Fetch order items
$items_sql = "SELECT p.product_name, oi.quantity, oi.price
              FROM order_items oi
              JOIN products p ON oi.product_id = p.id
              WHERE oi.order_id = $order_id";
$items_res = mysqli_query($conn, $items_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Success - Nostra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="nostra-container">
    <h2>Thank you, <?= $order['username'] ?>!</h2>
    <p>Your order #<?= $order['order_id'] ?> has been placed successfully on <?= $order['order_date'] ?>.</p>

    <h3>Order Summary:</h3>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
        <?php $total = 0; 
            while($item = mysqli_fetch_assoc($items_res)):
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?= $item['product_name'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>₹<?= number_format($item['price'],2) ?></td>
            <td>₹<?= number_format($subtotal,2) ?></td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3" align="right"><strong>Total:</strong></td>
            <td>₹<?= number_format($total,2) ?></td>
        </tr>
    </table>

    <p><a href="index.php">Continue Shopping</a></p>
</div>
</body>
</html>