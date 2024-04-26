<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
        <a href="home.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/home.png" alt="home" style="margin-right: 10px;">
        <span style="color: black;">Home</span></a>
<div class="dropdown">
                <a href="Cart.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
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
    <p style="margin-top: 50px; text-align: center; font-size: 30px;">Welcome to our home page</p>
    <div class="footer">
        <h2>Contacts</h2>
        <p>E-commerce Branch</p>
        <p>66, Mohakhali, Dhaka</p>
        <p>Contact Number: 880 1900000001</p>
    </div>
</body>
</html>
