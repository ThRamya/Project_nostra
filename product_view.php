<?php
session_start();
//unset($_SESSION['cart']);
include("db.php");
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";
if(isset($_POST['add_to_cart']))
    {
        $product_id= $_POST['product_id'];
        $product_name= $_POST['product_name'];
        $product_price= $_POST['product_price'];
        $product_image= $_POST['product_image'];
        $product_description = $_POST['product_description']; 

        // Check if the cart exists in session
         if(!isset($_SESSION['cart'])){
               $_SESSION['cart'] = []; // create an empty cart if not exists
         }
         //$_SESSION
        //This is a special PHP array that stores data for the current user session.
        //Anything inside $_SESSION is private to this user.
         //$_SESSION['cart'] = [    101 => ['name'=>'Blazer', 'price'=>1200, 'quantity'=>1]];
         //If $product_id = 101, isset($_SESSION['cart'][101]) → true
         //If $product_id = 102, isset($_SESSION['cart'][102]) → false

        // If product already in cart, increase quantity
        if(isset($_SESSION['cart'][$product_id]))
            {

                $_SESSION['cart'][$product_id]['quantity'] += 1;

            }

        else

            {
                 // If product not in cart, add it with quantity = 1 //'name' → key 'Blazer' → value
                 $_SESSION['cart'][$product_id] = [
                        'name' => $product_name,
                        'price' => $product_price,
                        'image' => $product_image,
                        'description' => $product_description,
                        'quantity' => 1
                  ]; 
            }
            // Redirect to avoid form resubmission on refresh
            header("Location: product_backend.php?id=$product_id");
            exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $product['product_name'];?> </title>
    <link rel="stylesheet" href="style.css">
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
</head>
<body>
     <!-- navbar -->

    <nav class="navbar">
        <h1 class="nostra">Nostra</h1>
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
    <!--product-view-->
    <div class="product-page">
    <div class="product-container">
        <h1> <?php echo $product['product_name'];?></h1>
        <img src="images/<?php echo $product['image'];?>" width="300"> 
        <h2>Price:  ₹<?php echo number_format($product['price'],2);?></h2>
        <p><?php echo $product['description'];?></p>
        <form method="post" class="add-to-cart-container">
    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>">
    <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
    <input type="hidden" name="product_image" value="<?= $product['image']; ?>">
    <input type="hidden" name="product_description" value="<?= htmlspecialchars($product['description']); ?>">

    <button type="submit" name="add_to_cart" class="add-to-cart-btn">
        Add to Cart
    </button>
</form>
    
    </div>

  </div>
     <!--Footer-->

        <div class="footer">
            <div class="footer-container">
                <div class="footer-box-1">
                    <h2 class="headingText">Nostra</h2>
                        <p>Providing premium fashion and lifestyle products for every style enthusiast.</p>

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