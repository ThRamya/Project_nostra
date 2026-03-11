<?php
include("db.php");

$fullname = $_POST['fname'];
$email = $_POST['email'];
$msg = $_POST['textarea'];

$sql="insert into contact_messages(full_name,email,message) values('$fullname','$email','$msg')";

$result=mysqli_query($conn,$sql); 

if($result){
    echo "data inserted";
}
else{
    echo "not insert";
}

mysqli_close($conn);

?>
