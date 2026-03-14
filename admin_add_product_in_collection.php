<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
     <link rel="icon" href="images/N_n.jpg">
    <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #e8fff5;

            
        }

        form {
            background: #b2f2d7;
            background-color: ; /* pure white form */
            padding: 25px 30px;
            border-radius: 10px;
            width: 350px;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

      
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #2e5a47; /* soft green */
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0dd280; /* darker green on hover */
        }

        @media (max-width: 400px) {
            form {
                width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="post" enctype="multipart/form-data" action="admin_backend.php">
        <label>Product Name:</label><br>
        <input type="text" name="product_name" required><br><br>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" min="0" required><br><br>

        <label>Image:</label>
        <input type="file" name="file" accept="image/*" required><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <input type="submit" name="submit" value="Add Product">

    </form>
</body>
    </html>