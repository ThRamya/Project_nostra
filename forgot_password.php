<?php
include('db.php');
$message="";
if(isset($_POST['reset']))
    {
        $user_input=$_POST['user_input'];

        $sql="select * from users where email='$user_input' or mobile_no='$user_input'";

        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
            {
               $new_password=password_hash("Newpass@123", PASSWORD_DEFAULT);

               $updated_query="update users set password='$new_password' where email='$user_input' or mobile_no='$user_input'";

               $connection=mysqli_query($conn,$updated_query);

               $message="Password reset successfully! Your new password is: Newpass@123, now click back to login";
                
            }
            else
                 {
                $message="Email or Mobile number not registered!";
                }
    }     

?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="style.css">
<link rel="icon" href="images/N_n.jpg">
</head>
<body>
    <div class="nostra-container">
        <h2>Reset Password</h2>

        <?php if($message != ""): ?>
        <p class="message">
            <?php echo $message; ?>
        </p>
        <?php endif; ?>

        <form method="post">

        <label>Enter Email or Mobile number</label>
        <input type="text" name="user_input" required>
        

        <button type="submit" name="reset">Reset Password</button>

        </form>

        <p class="divider"><a href="login.php" style="text-decoration:none;">Back to Login</a></p>
        </div>



</body>
</html>