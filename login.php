<?php
session_start();
include('db.php');

$message="";

if(isset($_POST['login']))
{
   $user_input= $_POST['user_input'];
   $password= $_POST['password'];

   $sql="select * from users where email='$user_input' or mobile_no='$user_input'";
   
   $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
   {
       
        $user=mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password']))
    {  
        // --- Step 1: Set session variables ---
        $_SESSION['user_id']=$user['user_id'];
        $_SESSION['username']=$user['username'];

        // --- Step 2: Merge session cart into DB ---
            if(isset($_SESSION['cart'])) { // check if user added products before login
                foreach($_SESSION['cart'] as $product_id => $item)
                {
                    $quantity = $item['quantity'];
                    $user_id = $_SESSION['user_id'];

                    $sql_merge = "INSERT INTO user_cart (user_id, product_id, quantity)
                                  VALUES ($user_id, $product_id, $quantity)
                                  ON DUPLICATE KEY UPDATE quantity = quantity + $quantity";

                    $res=mysqli_query($conn,$sql_merge);
                }
                 // clear session cart after merging
                unset($_SESSION['cart']);
            }


        header("Location:index.php");
        exit;
       
    }
     else
        {
            $message="Incorrect password!";
        }
}
    else
    {
        $message="Account not found. Please sign up first.";

    }

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Nostra Login</title>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="images/N_n.jpg">
</head>
<body>
<div class="nostra-container">

<h2>Sign In </h2>

<?php if($message != ""): ?>
        <p class="message">
            <?php echo $message; ?>
        </p>
<?php endif; ?>

 <form method="post">
    <label>Enter Email or mobile number</label>
    <input type="text" name="user_input" id="user_input" required><br><br>
    <span id="emailError" class="error"></span>
    
    <label>Password</label>
    <input type="password" name="password" id="password" required><br><br>
    <span id="passError" class="error"></span>
    
    <button type="submit" name="login" id="login" >Sign In</button>
    <p style="text-align:center; margin-top:5px;">
    <a href="forgot_password.php" style="color:#10b981; text-decoration:none;">Forgot Password?</a>
</p>
</form>
<p class="divider">New to Nostra? </p>
<a href="signup.php" class="create-btn">Create your Nostra account</a>
</div>
<script src="login.js"></script>
</body>
</html>