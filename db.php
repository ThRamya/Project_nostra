<?php
//http://localhost/phpmyadmin/ to php connection setting

$servername="127.0.0.1:3307";// some have server name as "localhost"
$user="root";
$pwsd="";
$database="nostra_db";
//mysqli_connect() it tell the version of mysql

$conn=mysqli_connect($servername,$user,$pwsd,$database); //connection establish
if(!$conn){
    die("connection error:".mysqli_connect_error());
}
// else{
//     echo "successfully connection connected";
// }
// //mysqli_close($conn);
// echo "<pre>";
// print_r($conn); // to see connection establish
// echo "</pre>";
?>




