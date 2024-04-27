<?php

include 'DBconnect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   mysqli_query($conn, "UPDATE user SET name = '$update_name', email = '$update_email' , phone='$update_phone', address='$update_address' WHERE user_id = '$user_id'") or die('query failed');

   
   $message[] = 'User Details Updated';

 


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
        <a href="home.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/home.png" alt="home" style="margin-right: 10px;">
        <span style="color: black;">Home</span></a>
<div class="dropdown">
                <a href="index.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/box.png" alt="box" style="margin-right: 10px;">
                <span style="color: black;">Product</span></a>
                <div class="dropdown-content">
                    <a href="cpu.php">CPU</a>
                    <a href="graphics_card.php">Graphics Card</a>
                    <a href="motherboard.php">Motherboard</a>
                    <a href="ram.php">RAM</a>
                    <a href="storage.php">Storage</a>
                    <a href="powersupply.php">Power Supply</a>
                </div>
            </div>
            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="login.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Login</span></a>
            <a href="signup.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/signing-a-document.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">Sign Up</span></a>
            <a href="account.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">My Profile</span></a>
        </div>
    </nav>


   
<div class="update-profile">
<h1>PLease</h1>
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');
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
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box"> <br><br>
            <span>Your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"> <br><br>
            <span>Your Number :</span>
            <input type="text" name="update_phone" value="<?php echo $fetch['phone']; ?>" class="box"> <br><br>
            <span>Your Addresss :</span>
            <input type="text" name="update_address" value="<?php echo $fetch['address']; ?>" class="box"> <br><br>
          
               </div>
         
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn"> <br><br>
      <a href="account.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>