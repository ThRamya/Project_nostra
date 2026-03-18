<?php
session_start();
include("db.php");

// --- Mark order as delivered (simple query) ---
if(isset($_POST['deliver_order'])){
    $order_id = intval($_POST['order_id']);  
    $update_sql = "UPDATE orders SET order_status='Delivered' WHERE order_id=$order_id";
    $result = mysqli_query($conn, $update_sql);

    if($result){
        echo "<p style='color:green;'>Order #$order_id marked as Delivered.</p>";
    } else {
        echo "<p style='color:red;'>Failed to update order.</p>";
    }
}

// --- Fetch all orders with total quantity and products ---
$orders_sql = "
SELECT o.order_id, u.username, o.total_price, o.order_status, o.order_date,
       SUM(oi.quantity) as total_quantity,
       GROUP_CONCAT(p.product_name SEPARATOR ', ') as products
FROM orders o
JOIN users u ON o.user_id = u.user_id
JOIN order_items oi ON o.order_id = oi.order_id
JOIN products p ON oi.product_id = p.id
GROUP BY o.order_id
ORDER BY o.order_date DESC
";

$orders_res = mysqli_query($conn, $orders_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .nostra-container { max-width:1200px; width:95%; margin:20px auto; padding:20px;}
        table { width:100%; border-collapse: collapse; min-width:900px;}
        th, td { padding:10px; text-align:center; border:1px solid #ddd; }
        th { background:#f4f4f4; font-weight:bold;}
        tr:nth-child(even) { background:#fafafa; }
        td.status-pending { color:#f59e0b; font-weight:bold;}
        td.status-delivered { color:#10b981; font-weight:bold;}
        button { padding:5px 10px; background:#10b981; color:#fff; border:none; border-radius:5px; cursor:pointer;}
        button:hover { background:#059669; }
    </style>
</head>
<body>
<div class="nostra-container">
<h2>All Orders</h2>
<table>
<tr>
    <th>Order ID</th>
    <th>User</th>
    <th>Products</th>
    <th>Total Quantity</th>
    <th>Total Price</th>
    <th>Status</th>
    <th>Order Date</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($orders_res)): ?>
<tr>
    <td><?= $row['order_id'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['products'] ?></td>
    <td><?= $row['total_quantity'] ?></td>
    <td>₹<?= number_format($row['total_price'],2) ?></td>
    <td class="<?= $row['order_status']=='Pending'?'status-pending':'status-delivered' ?>">
        <?= $row['order_status'] ?>
    </td>
    <td><?= $row['order_date'] ?></td>
    <td>
        <?php if($row['order_status']=='Pending'): ?>
        <form method="post" style="margin:0;">
            <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">
            <button type="submit" name="deliver_order">Mark Delivered</button>
        </form>
        <?php else: ?>
            Delivered
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>

</table>
</div>
</body>
</html>