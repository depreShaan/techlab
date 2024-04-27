<?php
$connect = mysqli_connect("localhost", "root", "", "techlab");
$product_id=$_GET['product_id'];
$sql="SELECT * FROM product WHERE product_id = '$product_id'";
$product_query_result=mysqli_query($connect,$sql);
$product=mysqli_fetch_assoc($product_query_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa; /* Light blue background */
            color: #333;
        }

        .product-details {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .product-details h5 {
            color: #0056b3; /* Slightly darker blue for headings */
            font-size: 28px;
            font-weight: bold;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-details table tr td {
            padding: 12px;
            font-size: 16px;
        }

        .product-details table tr td:first-child {
            font-weight: bold;
            width: 40%;
        }

        .product-details .rating {
            color: #f39c12;
        }

        .btn-custom {
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 5px;
            margin-top: 10px;
            background-color: #17a2b8;
            border: none;
        }

        .btn-custom:hover {
            background-color: #138496;
        }

        .regular-price {
            text-decoration: line-through; /* Strikes through the regular price */
        }

        .special-price {
            font-weight: bold; /* Makes the text bold */
            color: green; /* Sets the text color to green */
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
     </style>
</head>

<body class="bg-white">
    <!-- product -->
    <section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 d-flex align-items-center justify-content-center">
                    <img src="images\<?=$product['images']?>" alt="product" class="img-fluid">
                </div>

                <div class="col-sm-6 col-md-7 py-5">
                    <div class="product-details">
                        <h5><?=$product['brand']." ".$product['model_name']?></h5>
                        <hr> 
                        <table class="table">
                            <tbody>
                                <tr><td>Brand</td><td><?=$product['brand']?></td></tr>
                                <tr><td>Product Model</td><td><?=$product['model_name']?></td></tr>
                                <tr><td>Regular Price</td><td class="regular-price"><?=$product['old']?>৳</td></tr>
                                <tr><td>Special Price</td><td class="special-price"><?=$product['new']?>৳</td></tr>
                                <tr><td>Stock Status</td><td>In Stock</td></tr>
                                <tr><td>Product ID</td><td><?=$product['product_id']?></td></tr>
                                <tr><td>Warranty</td><td><?=$product['warranty']?> years</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !product -->
</body>
</html>
