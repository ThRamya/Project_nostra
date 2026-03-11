<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
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
    <link rel="icon" href="images/N.jpg">
    <!--font awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

body{
font-family:Poppins, sans-serif;
background:#f5f5f5;
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

</style>

</head>

<body>
 <!-- navbar -->

    <nav class="navbar">
        <h1>Nostra</h1>
        <div class="navbar-links">
            <p class="navbar-link"><a href="index.html">Home</a></p>
            <p class="navbar-link"><a href="collection.php">Collections</a></p>
            <p class="navbar-link"><a href="contact.html">Contact Us</a></p>
        </div>
         <div class="navbar-cart">
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count">
                    <?php
                    $count=0;
                    if(isset($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart'] as $item)
                            {
                                $count += $item['quantity'];

                            }
                        }
                        echo $count;
                    ?>
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
            <p class="side-navbar-link"><a href="index.html">Home</a></p>
            <p class="side-navbar-link"><a href="collection.php">Collections</a></p>
            <p class="side-navbar-link"><a href="contact.html">Contact Us</a></p>
        </div>
    </div>
<div class="shopping-cart">
<h2 class="page-title">Shopping Cart</h2>

<?php if(empty($cart)): ?>

<p style="text-align:center;">Your cart is empty.</p>

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
                            <i class="fa-brands fa-instagram" style="color:#ffffff;"></i>
                            <i class="fa-brands fa-twitter" style="color:#ffffff;"></i>
                            <i class="fa-brands fa-facebook" style="color:#ffffff;"></i>
                        </div>
                </div>

            </div>
            <p class="subtitle">@2026 Nostra.com</p>
        </div>
        <script src="collection.js"></script>
</body>
</html>

