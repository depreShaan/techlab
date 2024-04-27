<?php

include 'DBconnect.php';
session_start();
$product_id = $_SESSION['product_id'];


if(isset($_POST['edit'])){
    $product_id = $_POST['product_id'];
    

}

if(isset($_POST['update_profile'])){
$product_id = $_POST['product_id'];

   $update_brand = mysqli_real_escape_string($conn, $_POST['update_brand']);
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_price = mysqli_real_escape_string($conn, $_POST['update_price']);
   $update_cat = mysqli_real_escape_string($conn, $_POST['update_cat']);
   $update_stock = mysqli_real_escape_string($conn, $_POST['update_stock']);
   $update_details = mysqli_real_escape_string($conn, $_POST['update_details']);
   $update_warranty = mysqli_real_escape_string($conn, $_POST['update_warranty']);
   mysqli_query($conn, "UPDATE product SET brand = '$update_brand', model_name = '$update_name' , new='$update_price', cat='$update_cat', stock='$update_stock' ,details='$update_details' , warranty='$update_warranty' WHERE product_id = '$product_id'") or die('query failed');

   
   $message[] = 'Product Details Updated';

 


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>/* profile.css */

body {
    background-color: #f0f8ff; /* Light blue background */
    font-family: Arial, sans-serif;
}

.container {
    margin-top: 50px;
}

.topbar {
    display: flex;
    justify-content: space-between;
    background-color: teal; /* Blue top bar */
    padding: 10px;
    color: white;
}

.card {
    border: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar {
    background-color: #fff;
}

.content {
    background-color: #fff;
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.topbar a {
    color: white;
    text-decoration: none;
}

.topbar a:hover {
    text-decoration: underline;
}

.card-body h5 {
    margin-bottom: 0;
}

.card-body .text-secondary {
    color: #6c757d; /* Dark grey text */
}
nav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: skyblue;
        }
        nav .links{
            display: flex;
            justify-content: center;
            
        }
        nav .links a{
            text-decoration: none;
            align-items: center;
            margin-left: 20px;
            color: black;
        }
        table{
            border-collapse: collapse;
            width: 600px;
            margin-top: 80px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td{
            border: 0px;
            padding: 10px;
            text-align: left;
        }
        th{
            background: #a5a5a5;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            
        }
        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            border-radius: 10px;
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: white;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }

</style>
</head>
<body>
<nav>
        <div class="links">

            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="Admin_dashboard.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Dashboard</span></a>
                 </div>
    </nav>


   
<div class="update-profile">
<h1>Edit Product Details</h1>
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `product` WHERE product_id = '$product_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Brand :</span>
            <input type="text" name="update_brand" value="<?php echo $fetch['brand']; ?>" class="box"> <br><br>
            <span>Model Name :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['model_name']; ?>" class="box"> <br><br>
            <span>Price :</span>
            <input type="text" name="update_price" value="<?php echo $fetch['new']; ?>" class="box"> <br><br>
            <span>Category :</span>
            <input type="text" name="update_cat" value="<?php echo $fetch['cat']; ?>" class="box"> <br><br>
            <span>Stock :</span>
            <input type="text" name="update_stock" value="<?php echo $fetch['stock']; ?>" class="box"> <br><br>
            <span>Details :</span>
            <input type="text" name="update_details" value="<?php echo $fetch['details']; ?>" class="box"> <br><br>
            <span>Warranty :</span>
            <input type="text" name="update_warranty" value="<?php echo $fetch['warranty']; ?>" class="box"> <br><br>
            <input type="hidden" name="product_id" value="<?php echo $fetch['product_id']; ?>">
               </div>
         
      </div>
      <input type="submit" value="Update Details" name="update_profile" class="btn"> <br><br>
      <a href="drop_product.php" class="delete-btn">Go back</a>
   </form>

</div>

</body>
</html>