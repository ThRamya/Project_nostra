<?php
session_start();
include("db.php");

$product_id = $_POST['product_id'];

if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    if(isset($_POST['increase'])){
        mysqli_query($conn,"
            UPDATE user_cart 
            SET quantity = quantity + 1 
            WHERE user_id = $user_id AND product_id = $product_id
        ");
    }

    if(isset($_POST['decrease'])){
        mysqli_query($conn,"
            UPDATE user_cart 
            SET quantity = quantity - 1 
            WHERE user_id = $user_id AND product_id = $product_id
        ");

        mysqli_query($conn,"
            DELETE FROM user_cart 
            WHERE quantity <= 0
        ");
    }

}else{

    // Guest cart
    if(isset($_POST['increase'])){
        $_SESSION['cart'][$product_id]['quantity']++;
    }

    if(isset($_POST['decrease'])){
        $_SESSION['cart'][$product_id]['quantity']--;

        if($_SESSION['cart'][$product_id]['quantity'] <= 0){
            unset($_SESSION['cart'][$product_id]);
        }
    }

}

header("Location: cart.php");
exit;
?>