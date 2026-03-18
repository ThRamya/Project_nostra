<?php
session_start();
include("db.php");

$product_id = $_GET['id'];

if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    mysqli_query($conn,"
        DELETE FROM user_cart
        WHERE user_id = $user_id AND product_id = $product_id
    ");

}else{

    unset($_SESSION['cart'][$product_id]);

}

header("Location: cart.php");
exit;
?>