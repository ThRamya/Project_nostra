<?php
include("db.php");

$id=$_GET['id'];

$sql="Select * from products where id=$id";

$result=mysqli_query($conn,$sql);

$product=mysqli_fetch_assoc($result);

include("product_view.php");
?>
