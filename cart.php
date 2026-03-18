<?php
session_start();
include("db.php");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$total = 0;
$cart = [];
if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT p.*, uc.quantity 
            FROM user_cart uc
            JOIN products p ON uc.product_id = p.id
            WHERE uc.user_id = $user_id";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
      $cart[$row['id']] = [
    'name' => $row['product_name'],
    'price' => $row['price'],
    'image' => $row['image'],
    'description' => $row['description'],
    'quantity' => $row['quantity']
];
    }

}else{

    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nostra</title>
    <!--Google fonts-->
    <!-- preconnect = prepare connection early for faster loading -->
    <!-- crossorigin = allow safe connection to another website -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <!--My Css-->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/N_n.jpg">
    <!--font awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

body{
font-family:Poppins, sans-serif;
/* background:#f5f5f5; */
 background: #e8fff5;
margin:0;
}

/* PAGE TITLE */

.page-title{
text-align:center;
margin:30px 0;
}

/* CART CONTAINER */

.cart-container{
width:85%;
margin:auto;
background:#fff;
padding:30px;
border-radius:8px;
}

/* CART ITEM */

.cart-item{
display:flex;
gap:30px;
padding:25px 0;
border-bottom:1px solid #ddd;
align-items:flex-start;
}

/* PRODUCT IMAGE */

.cart-img img{
width:390px;
border-radius:8px;
}

/* PRODUCT INFO */

.cart-info{
flex:1;
}

.cart-info h3{
font-size:22px;
margin-bottom:8px;
}

.description{
font-size:15px;
color:#444;
margin-bottom:10px;
}

.stock{
color:green;
font-size:14px;
}

.delivery{
font-size:14px;
color:#555;
margin-bottom:15px;
}

/* QUANTITY BOX */
.qty-box {
  display: flex;
  align-items: center;
  border: 2px solid #ffd814;  /* Amazon-like yellow outline */
  border-radius: 999px;       /* pill shape */
  overflow: hidden;
  background: #fff;           /* white background */
  width: fit-content;         /* adjust to content */
}

/* Trash icon button */
.delete-btn {
  padding: 6px 12px;
  font-size: 18px;
  color: #000;
  text-decoration: none;
  display: flex;
  align-items: center;
  cursor: pointer;
  background: #fff;
  border: none;               /* no extra line */
}

/* Minus button */
.minus-btn,
.plus-btn {
  border: none;
  background: #fff;
  padding: 6px 12px;
  font-size: 20px;
  cursor: pointer;
}

/* Quantity number */
.qty {
  padding: 6px 14px;
  font-weight: bold;
  font-size: 16px;
  text-align: center;
  background: #fff;
}




/* PRICE */

.cart-price{
font-size:22px;
font-weight:bold;
margin-left:auto;
}

/* SUBTOTAL */

.subtotal{
text-align:right;
margin-top:30px;
font-size:26px;
font-weight:bold;
}
/* My Orders Button */
.my-orders-btn-container {
    text-align: left;
    margin-top: 20px;
}

.my-orders-btn {
    display: inline-block;
    padding: 12px 25px;
    background-color: #10b981; /* Green */
    color: #fff;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.my-orders-btn:hover {
    background-color: #059669;
}
</style>

</head>

<body>
 <!-- navbar -->

    <nav class="navbar">
        <h1>Nostra</h1>
        <div class="navbar-links">
            <p class="navbar-link"><a href="index.php">Home</a></p>
            <p class="navbar-link"><a href="collection.php">Collections</a></p>
            <p class="navbar-link"><a href="contact.html">Contact Us</a></p>
        </div>
         <div class="navbar-cart">
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count">
                   <?php include("cart_count.php"); ?>
                </span>
            </a>
        </div>
        <div class="navbar-menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>
    <!--Side-Navbar-->
    <div class="side-navbar">
        <p style="text-align: right;" class="x-navbar">
            <i class="fa-solid fa-xmark"></i>
        </p>
        <div class="side-navbar-links">
            <p class="side-navbar-link"><a href="index.php">Home</a></p>
            <p class="side-navbar-link"><a href="collection.php">Collections</a></p>
            <p class="side-navbar-link"><a href="contact.html">Contact Us</a></p>
        </div>
    </div>
<div class="shopping-cart">
<h2 class="page-title">Shopping Cart</h2>

<?php if(empty($cart)): ?>

        <p style="text-align:center;">Your cart is empty.</p>
              <!-- My Orders Button -->
<?php if(isset($_SESSION['user_id'])): ?>
    <div class="my-orders-btn-container" style="text-align:center;";>
        <a href="my_orders.php" class="my-orders-btn" style= "background-color: #9ca7a4;">View My Orders</a>
    </div>
     <?php endif; ?>

<?php else: ?>

    <div class="cart-container">

        <?php foreach($cart as $id => $product):

        $price = $product['price'];
        $qty = $product['quantity'];
        $subtotal = $price * $qty;
        $total += $subtotal;

        ?>

        <div class="cart-item">

        <div class="cart-img">
        <img src="images/<?= $product['image']; ?>">
    </div>

    <div class="cart-info">

        <h3><?= $product['name']; ?></h3>

        <p class="description">
        <?= isset($product['description']) ? $product['description'] : 'No description available.' ?>
        </p>

        <p class="stock">In stock</p>
        <p class="delivery">FREE delivery on first order</p>

    <div class="qty-box">

    <a href="remove_from_cart.php?id=<?= $id ?>" class="delete-btn">
    <i class="fa-solid fa-trash"></i>
    </a>

    <form method="post" action="update_cart.php" style="display:inline;">
        <input type="hidden" name="product_id" value="<?= $id ?>">
        <button type="submit" name="decrease" class="minus-btn">-</button>
    </form>

    <span class="qty"><?= $qty ?></span>

    <form method="post" action="update_cart.php" style="margin:0;">
        <input type="hidden" name="product_id" value="<?= $id ?>">
        <button type="submit" name="increase" class="plus-btn">+</button>
    </form>

    </div>

    </div>

    <div class="cart-price">
          ₹<?= $price ?>
    </div>

    </div>

    <?php endforeach; ?>

    <h2 class="subtotal">
            Subtotal: ₹<?= $total ?>
    </h2>

    <?php if(!empty($cart)): ?>
    <div style="text-align:right; margin-top:20px;">
        <form action="checkout.php" method="post">
            <button type="submit" style="
                padding: 10px 20px;
                background-color: #10b981;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            ">Proceed to Checkout</button>
        </form>
    </div>
      <?php endif; ?>
      <!-- My Orders Button -->
<?php if(isset($_SESSION['user_id'])): ?>
    <div class="my-orders-btn-container">
        <a href="my_orders.php" class="my-orders-btn">View My Orders</a>
    </div>
<?php endif; ?>
    </div>

<?php endif; ?>

</div>


 <!--Footer-->

        <div class="footer">
            <div class="footer-container">
                <div class="footer-box-1">
                    <h2 class="headingText">Nostra</h2>
                        <p>The Standard chunk of Lorem ipsum used since then 1500s is reproduced below for those
                            interest</p>

                        <div class="footer-box-1">
                            <i class="fa-brands fa-instagram" style="color:#E1306C;"></i>
                            <i class="fa-brands fa-twitter" style="color:#1DA1F2;"></i>
                            <i class="fa-brands fa-facebook" style="color:#1877F2;"></i>
                        </div>
                </div>

            </div>
            <p class="subtitle">@2026 Nostra.com</p>
        </div>
        <script src="collection.js"></script>
</body>
</html>

