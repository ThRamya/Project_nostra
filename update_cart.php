<?php
session_start();

if(isset($_POST['increase']) && isset($_SESSION['cart'][$_POST['product_id']]))
    {
      $_SESSION['cart'][$_POST['product_id']]['quantity'] +=1;

    }
if(isset($_POST['decrease']) && isset($_SESSION['cart'][$_POST['product_id']]))
    {
      $_SESSION['cart'][$_POST['product_id']]['quantity'] -=1;

      if($_SESSION['cart'][$_POST['product_id']]['quantity']<1)
        {
            unset($_SESSION['cart'][$_POST['product_id']]);
        }

    }

    header("Location:cart.php");
    exit;
?>

