<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techlab";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
    <title>Admin Panel</title>

   
    <link rel="stylesheet" href="styles.css">
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
    }

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
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #e4e9f7;
}


.container {
    text-align: center;
}


.button {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border: 2px solid #333;
    background-color: teal;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
}

.button:hover {
    background-color: #45a049;
}
</style>
</head>
<nav>
        <div class="links">
            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            
        </div>
    </nav>
<body>
    <div class="container">
    <h1>Welcome to Admin Panel</h1>
     
        <a href="paymenthistory.php" class="button">View Payment History</a>
        <a href="insert_product.php" class="button">Add Product</a>
        <a href="userlist.php" class="button">View Userlist</a>
        <a href="drop_product.php" class="button">Edit Product</a>
        <a href="stock_status.php" class="button">Stock Status</a>
        <a href="order_approve.php" class="button">Approve Orders</a>
        <form method="GET" action="Admin_dashboard.php">
        <input type="submit" name="logout" value="Logout">
    </form>
    </div>
    
</body>
</html>
