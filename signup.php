<?php
include('db.php');
$message="";


if(isset($_POST['signup'])){
        $username=$_POST['uname'];
        $email=$_POST['email'];
        $mobile_no=$_POST['mobile_no'];
        $password=$_POST['password'];
        
        $sql="Select * from users where email='$email' or mobile_no='$mobile_no'";

        $check=mysqli_query($conn,$sql);
        if(mysqli_num_rows($check)>0){
            
            $message="Email or Mobile number already registered!";
        }
        else{
            $hash=password_hash($password,PASSWORD_DEFAULT); //PHP to securely encrypt (hash) passwords before storing them in the database.//$password → user’s original password //PASSWORD_DEFAULT → PHP automatically chooses the best hashing algorithm //$hash → encrypted password stored in database

            $insertquery= "insert into users(username,email,mobile_no,password) values('$username','$email','$mobile_no','$hash')";

            $connection= mysqli_query($conn,$insertquery);

            if($connection)
            {
                 $message="Signup successful!you can login now.";
               
            }
            else
            {
                $message = "Error! Please try again.";
            }
           
      
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

 <h2>Create Account</h2>

<?php if($message != ""): ?>
        <p class="message">
            <?php echo $message; ?>
        </p>
<?php endif; ?>

<form method="POST">
    <label>Name</label>
    <input type="text" name="uname" id="uname" required><br><br>
    <span id="nameError" class="error"></span>

    <label>Email</label>
    <input type="email" name="email" id="email" required><br><br>
    <span id="emailError" class="error"></span>
    
    <label>Mobile number</label>
    <input type="text" name="mobile_no" id="mobile_no" required><br><br>
    <span id="phoneError" class="error"></span>
    

    <label>Password</label>
    <input type="password" name="password" id="password" required><br><br>
    <span id="passError" class="error"></span>
    
    <button type="submit" name="signup" id="submit">Create your Nostra account</button>
</form>

<p class="divider">Already have an account?</p>
<a href="login.php" class="create-btn">Sign In</a>

<script src="signup.js"></script>

</div>
</body>
</html>

