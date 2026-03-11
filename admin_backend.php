<?php
include("db.php");
if(isset($_POST['submit'])) 
{
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $file_name=$_FILES["file"]["name"];
    $file_size=$_FILES["file"]["size"];
    $file_type=$_FILES["file"]["type"];
    $temp_folder=$_FILES["file"]["tmp_name"];

    $destination_folder="images/";

    if(move_uploaded_file($temp_folder,$destination_folder.$file_name))
        {
            $sql = "insert into products (product_name, price, image, description) 
                    values ('$product_name', '$price', '$file_name', '$description')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: collection.php");
                exit;
                    } 
            else {
                echo "Database error: ".mysqli_error($conn);
                }
        }
            else{
            echo "File upload failed!";
            }
 }
?>








