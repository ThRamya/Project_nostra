<?php
session_start();
include("db.php");

// Get logged-in user ID
$user_id = $_SESSION['user_id'] ?? null;

// Load cart
if($user_id){
    // Logged-in user → fetch cart from DB, join with products to get price
    $cart = [];
    $cart_query = mysqli_query($conn, "
        SELECT uc.product_id, uc.quantity, p.price 
        FROM user_cart uc 
        INNER JOIN products p ON uc.product_id = p.id
        WHERE uc.user_id = $user_id
    ");
    while($row = mysqli_fetch_assoc($cart_query)){
        $cart[$row['product_id']] = [
            'quantity' => $row['quantity'],
            'price' => $row['price']
        ];
    }
} else {
    // Guest → load cart from session
    $cart = $_SESSION['cart'] ?? [];
}

// Check if cart is empty
if(empty($cart)){
    echo "Your cart is empty.";
    exit;
}

// Ensure user is logged in to checkout
if(!$user_id){
    header("Location:index.php");
    exit;
}


// Calculate total price
$total_price = 0;
foreach($cart as $product){
    $total_price += $product['price'] * $product['quantity'];
}

// Insert into orders table
$order_sql = "INSERT INTO orders (user_id, total_price) VALUES ($user_id, $total_price)";
mysqli_query($conn, $order_sql);
$order_id = mysqli_insert_id($conn);  // get last inserted order_id

// Insert into order_items table
foreach($cart as $product_id => $product){
    $qty = $product['quantity'];
    $price = $product['price'];
    $item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                 VALUES ($order_id, $product_id, $qty, $price)";
    mysqli_query($conn, $item_sql);
}

// Clear session cart
unset($_SESSION['cart']);

// Clear user_cart table for logged-in users
$delete_cart_sql = "DELETE FROM user_cart WHERE user_id = $user_id";
mysqli_query($conn, $delete_cart_sql);

// Redirect to success page
header("Location: order_success.php?order_id=".$order_id);
exit;
?>