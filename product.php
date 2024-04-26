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

      <style>
        /* Custom CSS */
        body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        }

        .product-details {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .product-details h5 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse; /* Collapse borders */
        }

        .product-details table tr td {
            padding: 10px;
            font-size: 16px;
        }

        .product-details table tr td:first-child {
            font-weight: bold;
            width: 40%;
        }

        .product-details .rating {
            color: #f39c12;
        }

        .product-details .btn {
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .qty {
    font-family: 'Baloo', sans-serif;
        }

        .qty_input {
            width: 60px;
        }

        .qty-up,
        .qty-down {
            background: none;
            border: none;
            cursor: pointer;
        }

        .qty-up:focus,
        .qty-down:focus {
            outline: none;
        }

        .input-group {
            width: 150px;
        }

        .qty-up,
        .qty-down {
            padding: 0.5rem;
            font-size: 1.2rem;
        }

        .qty-up:hover,
        .qty-down:hover {
            background-color: #f8f9fa;
        }

        
    </style>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="index.js"></script>
    <!-- product -->
    <section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 d-flex align-items-center justify-content-center">
                    <img src="products\gpu1.jpg" alt="product" class="img-fluid">
                </div>

                <div class="col-sm-7 py-5">
                    <div class="product-details">
                        <h5 class="font-weight-bold mb-4">ASUS ROG STRIX GEFORCE RTX 4090 OC EDITION 24GB GDDR6X GRAPHICS CARD</h5>
                        <hr> 

                        <table class="table table-bordered">
                            <tbody>
                                <tr><td>Product ID</td><td>28578</td></tr>
                                <tr><td>Brand</td><td><a href="https://rog.asus.com/graphics-cards/graphics-cards/rog-strix/rog-strix-rtx4080-o16g-gaming-model/">Asus</a></td></tr>
                                <tr><td>Product Model</td><td>Asus ROG Strix GeForce RTX 4090 OC Edition 24GB GDDR6X Graphics Card</td></tr>
                                <tr><td>Product Price</td><td>367,000৳</td></tr>
                                <tr><td>Special Price</td><td>340,000৳</td></tr>
                                <tr><td>Stock Status</td><td>In Stock</td></tr>
                                <tr><td>Warranty</td><td>3 years</td></tr>
                        
                                        
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-row pt-4">
                            
                            <div class="col">
                                <button type="submit" class="btn btn-warning form-control" style="width: 300px;"><i class="fa-solid fa-cart-shopping"></i>    Add To Cart</button>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !product -->

    </body>
    </html>
