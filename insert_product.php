
<?php
include 'DBconnect.php';
session_start();
$email = $_SESSION['email'];
if(!isset($email)){
    header('location:login.php');
 };
 
 if(isset($_GET['logout'])){
    unset($email);
    session_destroy();
    header('location:login.php');
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<style>
    body {
        background-color: #f2f2f2; 
        color: #333; 
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
        margin: 0 auto;
        max-width: 600px; 
        background-color: #fff; 
        padding: 20px; 
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 

    h2 {
        color: #008080; 
    }

    label {
        color: #666; 
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button{
        background-color: #008080; 
        color: #fff; 
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #87CEEB;
    }

    footer {
        margin-top: 20px; 
        color: #666; 
    }
    *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e4e9f7;
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
            background: white;
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
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        h2, p {
            margin: 0;
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
    <div class="container">
        <h2>Add Product</h2>
        <form name="form" action="insertion.php" method="POST" enctype="multipart/form-data">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" required><br><br>
            
            <label for="name">Model Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="price">Old Price:</label>
            <input type="number" id="price" name="oprice" required><br><br>
            
            <label for="price">New Price:</label>
            <input type="number" id="price" name="nprice" required><br><br>

            <label for="color">Category:</label>
            <select id="color" name="cat">
                <option value="pro">Processor</option>
                <option value="mobo">Motherboard</option>
                <option value="gpu">Graphics Card</option>
                <option value="ssd">Storage</option>
                <option value="ram">RAM</option>
                <option value="psu">Power Supply</option>
            </select><br><br>

            <label for="warranty">Warranty:</label>
            <input type="text" id="warranty" name="warranty"><br><br>

            <label for="details">Details:</label>
            <input type="text" id="details" name="details"><br><br>
            <label for="image">Product Image:</label><br><br>
            <input type="file"  name="image" accept=".jpg, .jpeg, .png" ><br><br>
            <button type="submit" name="submit">Add Product</button>
        </form>
        </div>
        <br><br><br><br>
        <!-- Footer -->
        
  
    
  
</body>
</html>
