<?php

if(session_status() === PHP_SESSION_NONE){//Sessions enabled but no session started yet
    session_start();
}

$count = 0;

if(isset($_SESSION['user_id'])){

    include("db.php");

    $user_id = $_SESSION['user_id'];

    $res = mysqli_query($conn,"
        SELECT SUM(quantity) AS total
        FROM user_cart
        WHERE user_id = $user_id
    ");

    $row = mysqli_fetch_assoc($res);

    if(!empty($row['total'])){
    $count = $row['total'];
}

}else{

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $item){
            $count += $item['quantity'];
        }
    }

}

echo $count;
?>